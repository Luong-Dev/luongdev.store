  // Dữ liệu mẫu
  var data = [{
          month: 'Tháng 1',
          revenue: 1000
      },
      {
          month: 'Tháng 2',
          revenue: 1500
      },
      {
          month: 'Tháng 3',
          revenue: 2000
      },
      {
          month: 'Tháng 4',
          revenue: 2500
      },
      {
          month: 'Tháng 5',
          revenue: 1800
      }
  ];

  // Kích thước và biên độ của biểu đồ
  var width = 400;
  var height = 300;
  var margin = {
      top: 20,
      right: 20,
      bottom: 30,
      left: 40
  };

  // Tạo thẻ SVG cho biểu đồ
  var svg = d3.select('#chart')
      .append('svg')
      .attr('width', width + margin.left + margin.right)
      .attr('height', height + margin.top + margin.bottom)
      .append('g')
      .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');

  // Xác định phạm vi các trục x và y
  var x = d3.scaleBand()
      .range([0, width])
      .padding(0.1)
      .domain(data.map(function(d) {
          return d.month;
      }));

  var y = d3.scaleLinear()
      .range([height, 0])
      .domain([0, d3.max(data, function(d) {
          return d.revenue;
      })]);

  // Vẽ trục x
  svg.append('g')
      .attr('transform', 'translate(0,' + height + ')')
      .call(d3.axisBottom(x));

  // Vẽ trục y
  svg.append('g')
      .call(d3.axisLeft(y));

  // Vẽ các cột
  svg.selectAll('.bar')
      .data(data)
      .enter().append('rect')
      .attr('class', 'bar')
      .attr('x', function(d) {
          return x(d.month);
      })
      .attr('y', function(d) {
          return y(d.revenue);
      })
      .attr('width', x.bandwidth())
      .attr('height', function(d) {
          return height - y(d.revenue);
      });