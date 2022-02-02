var ctx = document.getElementById("myChart").getContext('2d');
var chart = new Chart(ctx, {
  type:"line",
  data:{
    labels:["2000", "2005", "2010", "2015", "2019"],
    datasets:[{
      label:"Java",
      data:[21.95, 34.76, 32.42, 27.69, 22.39],
      borderColor:"pink",
      backgroundColor:"rgba(241, 107, 141, 0)"
    },{
      label:"Javascript",
      data:[18.43, 23.43, 20.31, 21.92, 23.18],
      borderColor:"purple",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"PHP",
      data:[10.64, 23.11, 18.51, 11.57, 7.19],
      borderColor:"green",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"C",
      data:[38.94, 13.13 ,11.46 , 7.11, 5.35],
      borderColor:"lightgreen",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"C++",
      data:[13.69, 11.42, 12.22, 8.37, 6.62],
      borderColor:"yellow",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"C#",
      data:[3.78, 8.13, 9.03, 10.02, 8.41],
      borderColor:"grey",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"Perl",
      data:[10.83, 6.35, 0],
      borderColor:"red",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"Python",
      data:[0, 4.93, 9.06, 13.83, 24.27],
      borderColor:"blue",
      backgroundColor:"rgba(31, 167, 165, 0)"
    },{
      label:"Visual Basic",
      data:[10.56, 7.17, 4.87, 0],
      borderColor:"mediumpurple",
      backgroundColor:"rgba(31, 167, 165, 0)"
    }]
  },
  options:{
    title:{
      display:true,
      text: "プログラミング言語人気ランキング(※TIOBEより参照)",
    },
    elements:{
      line:{
        tension:0
      }
    },
    scales:{
      yAxes:[{
        ticks:{
          suggestedMax:40,
          suggestedMin:0,
          stepSize:5,
          callback:function(value, index, values){
            return value + "%";
          }
        }
      }]
    }
  }
});

