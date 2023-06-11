  // Load the Visualization API and the corechart package.
  google.charts.load('current', {
      'packages': ['corechart']
  });
  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);
  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {
      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
          ['Mushrooms', 4],
          ['Onions', 3],
          ['Olives', 2],
          ['Zucchini', 0],
          ['Pepperoni', 0]
      ]);
      // Set chart options
      var options = {
          'title': 'THỐNG KÊ HÀNG HÓA TỪNG LOẠI',
          is3D: true,
          'width': 1000,
          'height': 1000,
          sliceVisibilityThreshold: 0
      };
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
  }