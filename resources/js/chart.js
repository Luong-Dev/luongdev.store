 // Dữ liệu biểu đồ
 var data = {
     labels: ['January', 'February', 'March', 'April', 'May', 'June'],
     datasets: [{
         label: 'Doanh thu',
         data: [500, 750, 900, 600, 800, 1200],
         backgroundColor: 'rgba(75, 192, 192, 0.2)',
         borderColor: 'rgba(75, 192, 192, 1)',
         borderWidth: 1
     }]
 };

 // Cấu hình biểu đồ
 var options = {
     scales: {
         y: {
             beginAtZero: true
         }
     }
 };

 // Tạo biểu đồ
 var ctx = document.getElementById('myChart').getContext('2d');
 var myChart = new Chart(ctx, {
     type: 'bar',
     data: data,
     options: options
 });