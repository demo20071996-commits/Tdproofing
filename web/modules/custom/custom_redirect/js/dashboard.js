// (function ($, Drupal) {
//   Drupal.behaviors.dashboardJS = {
//     attach: function (context, settings) {

//       $('.dashboard-card', context).once('dashboardClick').on('click', function () {
//         alert("Opening details for: " + $(this).find('h3').text());
//       });

//     }
//   }
// })(jQuery, Drupal);


// dashboard.js
document.addEventListener('DOMContentLoaded', function () {
  // Sidebar toggle for small screens
  var toggle = document.getElementById('tdToggle');
  var sidebar = document.getElementById('tdSidebar');
  if (toggle && sidebar) {
    toggle.addEventListener('click', function () {
      sidebar.classList.toggle('td-sidebar-collapsed');
      if (sidebar.style.display === 'none') {
        sidebar.style.display = 'flex';
      } else if (window.innerWidth < 768) {
        // mobile toggle show/hide
        if (sidebar.style.display === 'flex') {
          sidebar.style.display = 'none';
        } else {
          sidebar.style.display = 'flex';
        }
      }
    });
  }

  // Initialize donut chart (Chart.js)
  var ctx = document.getElementById('articlesDonut');
  if (ctx) {
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Delayed Articles','Pending Articles','Approved Articles'],
        datasets: [{
          data: [114, 56, 2434],
          backgroundColor: ['#ffb84d', '#ff7a59', '#2ea44f'],
          hoverOffset: 6
        }]
      },
      options: {
        cutout: '70%',
        plugins: {
          legend: { position: 'bottom' }
        },
        maintainAspectRatio: false,
      }
    });
  }

  // table row action sample:
  document.querySelectorAll('.td-table .btn-outline-primary').forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.preventDefault();
      // open edit drawer or redirect:
      alert('Edit article - wire up to your route.');
    });
  });
});
