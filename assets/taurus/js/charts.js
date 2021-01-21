$(document).ready(function(){        
    
    
    if($("#dash_chart_2").length > 0){
        
        var data1  = [ [1, 1023], [2, 1244], [3, 1506], [4, 1330], [5, 1065], [6, 890], [7,650] ];
        var data2  = [ [1, 868], [2, 1485], [3, 1355], [4, 1002], [5, 1200], [6, 755], [7,800] ];
        
        var dash_chart_2 = $.plot($("#dash_chart_2"), [{ data: data1, label: "Search Traffic"},{data: data2, label: "Referal Traffic"}],{ 
                                  series: {lines: { show: true }, points: { show: true }},
                                  grid: { hoverable: true, clickable: true},
                                  xaxis: {max: 7,ticks: [[1,'Mon'],[2,'Tue'],[3,'Wed'],[4,'Thu'],[5,'Fri'],[6,'Sat'],[7,'Sun']]}
                              });          
        
    }    
});

$(window).resize(function(){

});