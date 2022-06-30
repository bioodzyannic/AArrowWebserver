class AAMetrics{
	constructor(json,ss=false,time_sort="week"){
		this.json = JSON.parse(json);
		this.time_sort = time_sort;
		this.ss = ss;
		this.metrics = {
			totalHours:{color:"var(--selected,#12bd1c)",label:"Schd Hours"},
			workedHours:{color:"var(--selected,#12bd1c)",label:"Worked Hours"},
			missedHours:{color:"var(--selected,#12bd1c)",label:"Missed Hours"},
			numberOfShifts:{color:"var(--selected,#12bd1c)",label:"Shifts"},
			// filledRate:{color:"var(--selected,#12bd1c)",label:"Fill Rate"}
		};
		if(!this.ss){
			this.metrics['revenue']={color:"var(--selected,#12bd1c)",label:"Revenue"};
		}else{
			this.metrics['wage']={color:"var(--selected,#12bd1c)",label:"Money made"};
		}
		// this.selectedMetrics = ["totalHours","workedHours","missedHours","numberOfShifts","revenue"];
		this.selectedMetrics = ["totalHours"];
		this.regions = this.getRegions();
        this.regionsColors={}
		this.selectedRegions = [Object.keys(this.getRegions())[0]];
		this.dateOptions = { weekday: 'long', year: 'numeric', month: 'numeric', day: 'numeric' };
		this.ranges = ['day','week','month','year'];
		this.types = ['line','bar','doughnut'];
        this.isStacked = false;
		this.multiMetric = true;
	}
	// -----------------------------------------------
	// Markets
	// -----------------------------------------------
     
    getRegions(key='region'){
        return this.json.reduce((group,elem)=>{
            let keyValue = elem[key]
            return {...group,[keyValue] : [...(group[keyValue] ?? []), elem]}
        },{});
    }

    regionColor(factor){
        return `hsl(${360 + (factor * 15)}deg 78% 52%)`
    }

    regionSelectors(){
		let target = document.querySelector('#global-regions'); 
        target.innerHTML='';
		// LABEL
			let label = document.createElement('label');
			label.innerHTML ='Regions';
			label.setAttribute('onclick',`this.parentElement.setAttribute('data-open', this.parentElement.getAttribute('data-open') === '1' ? '0' : '1')`)
			target.parentElement.prepend(label)
		// LABEL
		Object.keys(this.getRegions()).forEach((t,index) => {
			let div = document.createElement('DIV');
			div.setAttribute('onclick','select(this)');
			div.className = this.selectedRegions[0] == t ? 'event range-selector active' : 'event range-selector'; 
			div.innerHTML = `<span class="value">${this.regions[t][0].marketName}</span>`;

            //COLORS
            
            let regionColor = this.regionColor(index);
            this.regionsColors[t] = regionColor;
			div.style = `--selected:${regionColor}`;
			div.addEventListener('click',(e)=>{
				e.stopPropagation();
				this.changeSelectedRegion(t);
				// Y
				let newY = this.gatherYDataset();
				this._graph.yDataset.data = newY.data;
				this._graph._chart.data.datasets = newY.data;
				// Y scale
				this._graph._chart.options.scales.y.max = newY.max * 1.1

				this._graph._chart.update();
				
			});
			target.append(div)
		});
	}

    changeSelectedRegion(newRegion){
		if(!this.selectedRegions.includes(newRegion)){
			this.selectedRegions.push(newRegion);
		}else{
			this.selectedRegions = this.selectedRegions.filter(m => m !== newRegion);
		}
        this.update();
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
			// this.globalTotalRevenue()
		];
		if(!this.ss){metrics.push(this.globalTotalRevenue())}else{metrics.push(this.globalTotalWage())}

		let target = document.querySelector('#global-info');
        target.innerHTML='';
		metrics.forEach(m => {
			let p = document.createElement('P');
			p.innerHTML = `<b>${m.name}</b> ${m.data}`;
			target.append(p);
		});
	}

	globalTotalHours(){
		let totalHours=0;
        this.selectedRegions.map((region,i)=>{ 
            this.regions[region].forEach(shift => {
                totalHours += this.totalHours(shift);
            });
        });
		return {name: 'Total Schd Hours:',data: totalHours.toFixed(2)};
	}

	globalTotalRevenue(){
		let revenue=0;
        this.selectedRegions.map((region,i)=>{ 
            this.regions[region].forEach(shift => {
			revenue += this.revenue(shift);
            });
		});
		return {name: 'Total Revenue: $',data: revenue};
	}

	globalTotalWage(){
		let revenue=0;
        this.selectedRegions.map((region,i)=>{ 
            this.regions[region].forEach(shift => {
			revenue += this.wage(shift);
            });
		});
		return {name: 'Total Money Made: $',data: revenue};
	}

	globalTotalWorkedHours(){
		let totalHours=0;
        this.selectedRegions.map((region,i)=>{ 
            this.regions[region].forEach(shift => {
                totalHours += this.workedHours(shift);
            });
		});
		return {name: 'Total Worked Hours:',data: totalHours.toFixed(2)};
	}
	globalMissedWorkedHours(){
		let totalHours=0;
        this.selectedRegions.map((region,i)=>{ 
            this.regions[region].forEach(shift => {
                totalHours += this.missedHours(shift);
            });
		});
		return {name: 'Total Missed Hours:',data: totalHours.toFixed(2)};
	}
	
	globalTotalShifts(){
        let shifts=0;
        this.selectedRegions.map((region,i)=>{ 
            this.regions[region].forEach(shift => {
                shifts += 1;
            });
		});
		return {name: 'Total Shifts:',data: shifts};
	}

	changeSelectedMetric(newMetric){
		if(!this.selectedMetrics.includes(newMetric)){
			this.selectedMetrics = [newMetric];
		}
	}

	addMetric(newMetric){
		if(!this.selectedMetrics.includes(newMetric)){
			this.selectedMetrics.push(newMetric);
		}else{
			this.selectedMetrics = this.selectedMetrics.filter(m=>{return m!=newMetric;});
		}
	}

	metricSelectors(){
		let target = document.querySelector('#global-metric'); 
		target.innerHTML='';
		// LABEL
			let label = document.createElement('label');
			label.innerHTML ='Chart Options';
			label.setAttribute('onclick',`this.parentElement.setAttribute('data-open', this.parentElement.getAttribute('data-open') === '1' ? '0' : '1')`)
			target.parentElement.prepend(label)
		// LABEL
		Object.keys(this.metrics).forEach((t,index) => {
			let div = document.createElement('DIV');
			let buttonFix = this.multiMetric ? false : true;
			div.setAttribute('onclick',`select(this,${buttonFix})`);
			div.className = this.selectedMetrics[0] == t ? 'event range-selector active' : 'event range-selector'; 
			div.innerHTML = `<span class="value">${this.metrics[t].label}</span>`;
			div.style = `--selected:${this.metrics[t].color}`;
			div.addEventListener('click',(e)=>{
				e.stopPropagation();
				if(this.multiMetric==false){
					this.changeSelectedMetric(t);
				}else{
					this.addMetric(t);
				}
				// Y
				let newY = this.gatherYDataset();
				this._graph.yDataset.data = newY.data;
				this._graph._chart.data.datasets = newY.data;
				// // Y scale
				this._graph._chart.options.scales.y.max = newY.max * 1.1

				this._graph._chart.update();
				this._table.update({xDataset: this._graph.xDataset,yDataset: this._graph.yDataset});
                // this.update();
				
			});
			target.append(div)
		});
	}

    stackToggle(){
        let obj = this;
        let target = document.querySelector('#global-extra');
        target.innerHTML='';
			let div = document.createElement('DIV');
			div.setAttribute('onclick','select(this,true)');
			div.className = 'event range-selector'; 
			div.innerHTML = `<span class="value">Stacked</span>`;
			div.addEventListener('click',()=>{
                if(obj.isStacked){
                    obj.isStacked = false;
                    obj.update();
                }else{
                    obj.isStacked = true;
                    obj.stackLineChart();
                    obj.update();
                }
			});
			target.append(div)
    }

    stackLineChart(y){
        let collection;
		console.log(y)
        y.data.forEach((dataset,index)=>{
            console.log("current y: ",dataset.data);
            if(index==0){
                collection=dataset.data
            }else{
                let sum = dataset.data.map((num, idx)=>{
                    return num + collection[idx]
                });
                collection = sum
                y.data[index].data = sum
                console.log(y.data[index].data);
                console.log("Sum: ",sum);
                console.log("Collection: ",collection);
            }
        });
        console.log(collection);
        y.max = Math.max(...collection) * 1.1;
        return y;
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
			div.className = range == this.time_sort ? 'event range-selector active' : 'event range-selector'; 
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
		let reset = [
		"global-regions",
		"global-info",
		"global-date-range",
		"global-chart-type",
		"global-metric",
		"global-extra"
		]
		reset.forEach((m)=>{document.getElementById(m).innerHTML = '';});
		document.querySelector('[type="range"][orient="vertical"]').remove();
		this._graph._chart.destroy();
        dash = new AAMetrics(json);
		dash.graph();
    }

    update(){
        this.getRegions();

        // X
        if(!this.isStacked){
            var newX = this.xAxis().chart;
            this._graph.xDataset.data = newX;
            this._graph._chart.data.labels  = newX;
        }
        
		// Y
        if(!this.isStacked){
            var newY = this.gatherYDataset();
            this._graph.yDataset.data = newY.data;
            this._graph._chart.data.datasets = newY.data;
            // Y scale
            this._graph._chart.options.scales.y.max = newY.max * 1.1
        }
        
        if(dash._graph._chart.config._config.type!='line'){
            this._graph._chart.config._config.options.scales.x.stacked = this.isStacked;
            this._graph._chart.config._config.options.scales.y.stacked = this.isStacked;
        }
        this._graph._chart.update();
        this._table.update({xDataset: this._graph.xDataset,yDataset: this._graph.yDataset});

        this.globalMetrics();
        
    }
	
	// -----------------------------------------------
	// VALUES - CALCULATIONS - Y AXIS
	// -----------------------------------------------

	// DEFAULT
	numberOfShifts(shift){
		return 1;
	}

	revenue(shift){
        let r = parseFloat(shift.revenue.replace('$',''));
        // console.log(r);
		return r;
	}

	wage(shift){
        let r = parseFloat(shift.employee_wage.replace('$',''));
        // console.log(r);
		return r;
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
		// console.log(shift.date);
		// console.log("Workable",workable);
		// console.log("Worked",worked);
		if(workable - worked <= 0){
			// console.log("Missed", 0);
			// console.log('-------------------');
			return 0
		}else{
			// console.log("Missed", workable - worked);
			// console.log('-------------------');
			return workable - worked
		}
	}
	// filledRate(shift){
	// 	let worked = this.workedHours(shift);
	// 	let workable = this.totalHours(shift);
	// 	return (worked * 100)/ workable;
	// }


	yAxis(){
        let regionsY = this.selectedRegions.map((region,i)=>{
            let regionData = this.regions[region];
            let y = this.selectedMetrics.map(metric => {
                let values = this.xAxis().data.map(x => {
                    var yValue = 0;
                    regionData.forEach((y,index) => {
                        if(this.time_sort=="day"){
                            // DAILY

                            if(x.getUTCDate() == new Date(y.date).getUTCDate()){
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
            return {region:region[0],name:metric,data:values,color:this.regionsColors[region],label:this.metrics[metric].label};
            });
            return y;
        });
        return regionsY;
	}

	gatherYDataset(){
		const yAxis = this.yAxis();
		let maxYValue = 0;
		const yArray = []
        yAxis.forEach((yb,index) => {
            yb.forEach(y=>{
                if(maxYValue < Math.max(...y.data)){maxYValue=Math.max(...y.data)}
				//console.log(y)
                let bgc = y.color != undefined ? y.color.split(' ') : 'hsl(360deg 78% 80%)'.split(' ');
                yArray.push(
                        {
                            label: y.label,
                            data: y.data,
                            backgroundColor: `${bgc[0]} ${bgc[1]} 80% / 80%)`,
                            fill:true,
                            borderColor: y.color,
                            borderWidth: 2
                        }
                    ) 
                })
			//console.log(yb);

            return yb;
		});
		//console.log(yArray);
		return {data:yArray,label:"",max:maxYValue};
	}



	// -----------------------------------------------
	// RENDER
	// -----------------------------------------------

	getGobalMetrics(){
		// GLOBAL METRICS
		this.globalMetrics();
	
		// RANGE SELECTORS
		this.timeRangeSelectors();
	
		// RANGE SELECTORS
		this.typeChartSelectors();
	
		// METRIC SELECTORS
		this.metricSelectors();
	
		// REGION SELECTORS
		this.regionSelectors();
	
		// STACK TOGGLE
		// this.stackToggle();
	}

	graph(){

		this.getGobalMetrics();

		let y = this.gatherYDataset()
        if(this.isStacked){
            y = this.stackLineChart(y);
        }
		let args = {
			type:'bar',
			xDataset:{
				label:"Dates",
				data: this.xAxis().chart
			},
			yDataset:{
				data:y.data,
				label:y.label,
				max:y.max
			},
            isStacked:this.isStacked
		};
		// GRAPH
		let graph = new AAGraph(args,'#myChart');
		graph.render();
		this._graph = graph;
		
		// TABLE
		// let table = new AAtable(args,'#myTable');
		// table.render();
		// this._table = table;

	}
	
}

class AAGraph{
	constructor(data,target){
		this.type = data.type;
		this.target = target;
		this.xDataset = data.xDataset;
		this.yDataset = data.yDataset;
		this.isStacked = data.isStacked;
		// this.graph = 
	}

	addYData(data){
		this.data.datasets.push(data)
		this.update();
	}

	changeType(type){
		this.type=type;
		this._chart.config._config.type=type;
		this._chart.update();
	}

	scaleY(){
		let input = document.createElement('INPUT');
		input.setAttribute('type','range');
		input.setAttribute('orient','vertical');
		input.value = parseInt(this.yDataset.max * 1.1);
		input.min = 0;
		input.max = parseInt(this.yDataset.max * 20);
		input.addEventListener('input',()=>{
			//console.log(input.value);
			this._chart.config._config.options.scales.y.max=parseInt(input.value);
			this._chart.update();
		}, false);
		return input;
	}

	render(){
		document.querySelector('.chart-container').prepend(this.scaleY());
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
						},
                        stacked:this.isStacked,
                        minRotation:90,
                        maxRotation:90

					},
					y: {
						title: {
						display: true,
						text: this.yDataset.label
						},
						min: 0,
						max: this.yDataset.max * 1.1,
						ticks: {
						// forces step size to be 50 units
						stepSize: 1,
                        // stacked:this.isStacked
                        stacked:true
						}
					}
                },
                plugins: {
                    legend: {
                        display: false,
                    }
                }
				
			}
		});
		this._chart = myChart;
	}
}

class AAtable{
	constructor(data,target){
		this.data = data;
		this.target = target;
	}

	createSpec(field,value){
		return `
			<div class="spinner-spec">
				<div class="spec-title">${field}</div>
				<div class="">${value}</div>
			</div>
			`
	}

	getRows(){
		console.log(this.data);
		let  tableRow = this.data.xDataset.data;
		let container = document.createElement('DIV');
		container.className = 'spinners-container row-container';
		tableRow.forEach((date,index)=>{
			let row = document.createElement('DIV');
			row.className = 'spinner row';
			row.innerHTML = this.createSpec("Date",date);
			// Columns
			let  tableColumns = this.data.yDataset.data;
			tableColumns.forEach(col=>{
				row.innerHTML += this.createSpec(col.label,col.data[index]);
			})


			container.append(row);
		})
		return container.outerHTML
	}

	render(){
		document.querySelector(this.target).innerHTML = this.getRows();
	}

	update(newData){
		document.querySelector(this.target).innerHTML = '';
		let table = new AAtable(newData,this.target);
		table.render();
	}
}
