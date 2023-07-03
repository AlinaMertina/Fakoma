const mixedChart= new Chart(ctx,{
    data:{
        datasets:[{
            type:'bar',
            label:'Bar Dateset',
            data:[10,20,30,40]
        },
        {
            type:'line',
            label:'Line Dataset',
            data:[50,50,50,50],

        }],
        labels:['january','Febroary','March','April']
    },
        options:options
});