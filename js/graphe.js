$(document).ready (function ( ){
    $.ajax({
      url: "http://localhost/GestionEtudianFiliere/data.php",
      method: "GET",
       success: function(data) {
           console. log(data);

           var nom=[];
           var niveau=[];

           for(var i in data){
               nom.push(data[i].nom);
               niveau.push(data[i].niveau);
           }

           var chartdata = {
                 labels: nom,
                 datasets : [
                     {
                     label: 'filiere',
                     backgroundColor: 'rgba(200, 200, 200, 0.75)',
                     borderColor: 'rgba(200, 200, 200, 0.75)',
                     hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                     hoverBorderColor: 'rgba (200, 200, 200, 1)',
                     data: niveau
                     }
                ]
            };
        var ctx = $("#mycanvas");
        var barGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata
        });
       },
      error: function(data) {
           console. log(data);
       }
  });
});