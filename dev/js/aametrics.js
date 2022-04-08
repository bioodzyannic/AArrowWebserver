class AAMetrics{
	constructor(json,time_sort="day"){
		this.json = JSON.parse(json);
		this.time_sort = time_sort;
		this.metrics = {
			totalHours:{color:"rgb(3, 127, 242, 1)",label:"Schd Hours"},
			workedHours:{color:"rgba(0, 219, 246, 1)",label:"Worked Hours"},
			missedHours:{color:"rgba(255, 0, 0, 1)",label:"Missed Hours"},
			numberOfShifts:{color:"rgba(7, 57, 145, 1)",label:"Shifts"},
			revenue:{color:"rgba(4, 179, 50, 1)",label:"Revenue"},
			filledRate:{color:"rgba(0, 150, 136, 1)",label:"Fill Rate"}
		};
		// this.selectedMetrics = ["totalHours","workedHours","missedHours","numberOfShifts","revenue"];
		this.selectedMetrics = ["totalHours"];
		this.dateOptions = { weekday: 'long', year: 'numeric', month: 'numeric', day: 'numeric' };
		this.ranges = ['day','week','month','year'];
		this.types = ['line','bar','doughnut'];
	}

	// -----------------------------------------------
	// GLOBALS METRICS
	// -----------------------------------------------

	globalMetrics(){
		let metrics = [
			this.globalTotalHours(),
			this.globalTotalWorkedHours(),
			this.globalMissedWorkedHours(),
			this.globalTotalShifts(),
			this.globalTotalRevenue()
		];

		let target = document.querySelector('#global-info');
		metrics.forEach(m => {
			let p = document.createElement('P');
			p.innerHTML = `<b>${m.name}</b> ${m.data}`;
			target.append(p);
		});
	}

	globalTotalHours(){
		let totalHours=0;
		this.json.forEach(shift => {
			totalHours += this.totalHours(shift);
		});
		return {name: 'Total Schd Hours:',data: totalHours};
	}

	globalTotalRevenue(){
		let revenue=0;
		this.json.forEach(shift => {
			revenue += this.revenue(shift);
		});
		return {name: 'Total Revenue: $',data: revenue};
	}

	globalTotalWorkedHours(){
		let totalHours=0;
		this.json.forEach(shift => {
			totalHours += this.workedHours(shift);
		});
		return {name: 'Total Worked Hours:',data: totalHours};
	}
	globalMissedWorkedHours(){
		let totalHours=0;
		this.json.forEach(shift => {
			totalHours += this.missedHours(shift);
		});
		return {name: 'Total Missed Hours:',data: totalHours};
	}
	
	globalTotalShifts(){
		return {name: 'Total Shifts:',data: this.json.length};
	}

	changeSelectedMetric(newMetric){
		if(!this.selectedMetrics.includes(newMetric)){
			this.selectedMetrics.push(newMetric);
		}else{
			this.selectedMetrics = this.selectedMetrics.filter(m => m !== newMetric);
		}
	}

	metricSelectors(){
		let target = document.querySelector('#global-metric'); 
		Object.keys(this.metrics).forEach((t,index) => {
			let div = document.createElement('DIV');
			div.setAttribute('onclick','select(this)');
			div.className = this.selectedMetrics[0] == t ? 'event range-selector active' : 'event range-selector'; 
			div.innerHTML = `<span class="value">${this.metrics[t].label}</span>`;
			div.style = `--selected:${this.metrics[t].color}`;
			div.addEventListener('click',()=>{
				this.changeSelectedMetric(t);
				// Y
				let newY = this.gatherYDataset();
				this._graph.yDataset.data = newY.data;
				this._graph._chart.data.datasets = newY.data;
				// Y scale
				this._graph._chart.options.scales.y.max = newY.max + 1

				this._graph._chart.update();
				
			});
			target.append(div)
		});
	}

	// -----------------------------------------------
	// CHART TYPE
	// -----------------------------------------------

	typeChartSelectors(){
		let target = document.querySelector('#global-chart-type'); 
		this.types.forEach((t,index) => {
			let div = document.createElement('DIV');
			div.setAttribute('onclick','select(this,true)');
			div.className = index == 0 ? 'event range-selector active' : 'event range-selector'; 
			div.innerHTML = `<span class="value">${t.toUpperCase()}</span>`;
			div.addEventListener('click',()=>{
				this._graph.changeType(t)
				// select(this,true)
				// changeDateRange
			});
			target.append(div)
		});
	}

	// -----------------------------------------------
	// TIME SORTING - X AXIS
	// -----------------------------------------------

	timeRangeSelectors(){
		let target = document.querySelector('#global-date-range'); 
		this.ranges.forEach((range,index) => {
			let div = document.createElement('DIV');
			div.setAttribute('onclick','select(this,true)');
			div.className = index == 0 ? 'event range-selector active' : 'event range-selector'; 
			div.innerHTML = `<span class="value">${range.toUpperCase()}</span>`;
			div.addEventListener('click',()=>{
				this.changeDateRange(range);
			});
			target.append(div)
		});
	}

	weekRange(){
		let weeks = {}
		let weeksChart=[];
		this.dateRange().forEach(d => {
			var date = d;
			var startDate = new Date(d.getTime()); // otherwise date gets overriden

			date.setHours(0, 0, 0, 0);
			date.setDate(date.getDate() + 3 - (date.getDay() + 6) % 7);
			var week1 = new Date(date.getFullYear(), 0, 4);
			var result =  1 + Math.round(((date.getTime() - week1.getTime()) / 86400000
									- 3 + (week1.getDay() + 6) % 7) / 7);
		
			if( !(result in weeks)){
				weeks[result] = startDate;
				weeksChart.push(`Week #${result} - ${startDate.toLocaleDateString("en-US", this.dateOptions)}`);
			}
		});
		return {
			chart: weeksChart,
			data: Object.values(weeks)
		};
	}

	monthRange(){
		let months = {}
		let monthsChart=[];
		this.dateRange().forEach(d => {
			var result = new Date(d);
			if( !(result.getMonth() in months)){
				var month = result.toLocaleString('default', { month: 'long' });

				months[result.getMonth()] = new Date(result.getFullYear(), result.getMonth(), 1);;
				monthsChart.push(`${month}`);
			}
		});
		return {
			chart: monthsChart,
			data: Object.values(months)
		};
	}
	yearRange(){
		let years = {}
		let yearChart=[];
		this.dateRange().forEach(d => {
			var result = new Date(d);
			if( !(result.getFullYear() in years)){
				var year = result.getFullYear();
				years[result.getFullYear()] = new Date(`01-01-${year}`);
				yearChart.push(`${year}`);
			}
		});
		console.log(yearChart);
		console.log(Object.values(years));
		return {
			chart: yearChart,
			data: Object.values(years)
		};
	}

	// DEFAULT SORTING - BY DAY
	dateRange(){
		// IN CASE IS NOT SORTED BY DATE
		let sorted = this.json.sort((a, b)=>{
			return Date.parse(a.date) - Date.parse(b.date);
		});

		var datesArray = [];
		for(var dt= new Date(sorted[0].date); dt<= new Date(sorted[sorted.length - 1].date); dt.setDate(dt.getDate()+1)){
			datesArray.push(new Date(dt));
		}
		return datesArray;

	}
	xAxis(){
		if(this.time_sort=="day"){
			return {
				chart : this.dateRange().map(d=>{return d.toLocaleDateString("en-US", this.dateOptions)}),
				data :  this.dateRange()
			};
		}else if(this.time_sort=="week"){
			return this.weekRange();
		}else if(this.time_sort=="month"){
			return this.monthRange();
		}else if(this.time_sort=="year"){
			return this.yearRange();
		}
		
	}

	changeDateRange(newSort){
		this.time_sort = newSort;	
        this.update();
	}

    queryUpdate(json){
        this.json = JSON.parse(json);
        this.update();
    }

    update(){
        // X
		let newX = this.xAxis().chart;
		this._graph.xDataset.data = newX;
		this._graph._chart.data.labels  = newX;

		// Y
		let newY = this.gatherYDataset();
		this._graph.yDataset.data = newY.data;
		this._graph._chart.data.datasets = newY.data;
		// Y scale
		this._graph._chart.options.scales.y.max = newY.max + 1
        this._graph._chart.update();
    }
	
	// -----------------------------------------------
	// VALUES - CALCULATIONS - Y AXIS
	// -----------------------------------------------

	// DEFAULT
	numberOfShifts(shift){
		return 1;
	}

	revenue(shift){
		return shift.revenue;
	}

	totalHours(shift){
		return Math.abs(new Date(`January 1, 1970 ${shift.endTime}`) - new Date(`January 1, 1970 ${shift.startTime}`)) / 36e5;
	}

	workedHours(shift){
		return Math.abs(new Date(`January 1, 1970 ${shift.clockOutTime}`) - new Date(`January 1, 1970 ${shift.clockInTime}`)) / 36e5;
	}

	missedHours(shift){
		let workable = this.totalHours(shift);
		let worked = this.workedHours(shift);
		console.log(shift.date);
		console.log("Workable",workable);
		console.log("Worked",worked);
		if(workable - worked <= 0){
			console.log("Missed", 0);
			console.log('-------------------');
			return 0
		}else{
			console.log("Missed", workable - worked);
			console.log('-------------------');
			return workable - worked
		}
	}
	// filledRate(shift){
	// 	let worked = this.workedHours(shift);
	// 	let workable = this.totalHours(shift);
	// 	return (worked * 100)/ workable;
	// }

	yAxis(){
		let y = this.selectedMetrics.map(metric => {
			let values = this.xAxis().data.map(x => {
				var yValue = 0;
				this.json.forEach((y,index) => {
					if(this.time_sort=="day"){
						// DAILY
						if(x.getTime() == new Date(y.date).getTime()){
							yValue+=eval(`this.${metric}(${JSON.stringify(y)})`);
						}
					}else if(this.time_sort=="week"){
						//WEEKLY
						let next = this.json[index+1] ? new Date(this.json[index+1].date) : new Date(this.json[index].date);
						if(x.getTime() == new Date(y.date).getTime() || x.getTime() < next.getTime() && new Date(y.date).getTime() - x.getTime() < 6.048e8){
							yValue+=eval(`this.${metric}(${JSON.stringify(y)})`);

						}
					}else if(this.time_sort=="month"){
						//Monthly					
						if(new Date(y.date).getMonth() == x.getMonth()){
							yValue+=eval(`this.${metric}(${JSON.stringify(y)})`);
						}
					}else if(this.time_sort=="year"){
						//Monthly					
						if(new Date(y.date).getFullYear() == x.getFullYear()){
							yValue+=eval(`this.${metric}(${JSON.stringify(y)})`);
						}
					}
			});
			return yValue;
		});
		return {name:metric,data:values,color:this.metrics[metric].color,label:this.metrics[metric].label};
		});
		return y;
	}

	gatherYDataset(){
		const yAxis = this.yAxis();
		let maxYValue = 0;
		const yArray = yAxis.map((y,index) => {
			console.log(y);
			if(maxYValue < Math.max(...y.data)){maxYValue=Math.max(...y.data)}
			return {
					label: y.label,
					data: y.data,
					backgroundColor: y.color.replace("1)","0.5)"),
					borderColor: y.color,
					borderWidth: 2
				}
		});
		return {data:yArray,label:"",max:maxYValue};
	}

	// -----------------------------------------------
	// RENDER
	// -----------------------------------------------

	graph(){
		// GLOBAL METRICS
		this.globalMetrics();

		// RANGE SELECTORS
		this.timeRangeSelectors();

		// RANGE SELECTORS
		this.typeChartSelectors();

		// METRIC SELECTORS
		this.metricSelectors();

		let y = this.gatherYDataset()

		// GRAPH
		let graph = new AAGraph({
			type:'line',
			xDataset:{
				label:"Dates",
				data: this.xAxis().chart
			},
			yDataset:{
				data:y.data,
				label:y.label,
				max:y.max
			}
		},'#myChart');
		graph.render();
		this._graph = graph;
	}
	
}

class AAGraph{
	constructor(data,target){
		this.type = data.type;
		this.target = target;
		this.xDataset = data.xDataset;
		this.yDataset = data.yDataset;
		// this.graph = 
	}

	addYData(data){
		// {
		// 	label: 'Test',
		// 	data: [8, 5, 1, 15, 9, 7,2],
		// 	backgroundColor: 'rgba(54, 162, 235, 0.2)',
		// 	borderColor: 'rgba(54, 162, 235, 1)',
		// 	borderWidth: 1
		// }
		this.data.datasets.push(data)
		this.update();
	}

	changeType(type){
		this.type=type;
		this._chart.config._config.type=type;
		this._chart.update();
	}

	render(){
		const aaCanvas = document.querySelector(this.target);
		const ctx = aaCanvas.getContext('2d');
		const myChart = new Chart(ctx, {
			responsive: true,
			maintainAspectRatio: false,
			type: this.type,
			data: {
				labels: this.xDataset.data,
				datasets: this.yDataset.data
			},
			options: {
				scales: {
					x: {
						title: {
						display: true,
						text: this.xDataset.label
						}
					},
					y: {
						title: {
						display: true,
						text: this.yDataset.label
						},
						min: 0,
						max: this.yDataset.max + 1,
						ticks: {
						// forces step size to be 50 units
						stepSize: 1
						}
					}
					}
				
			}
		});
		this._chart = myChart;
	}
}
