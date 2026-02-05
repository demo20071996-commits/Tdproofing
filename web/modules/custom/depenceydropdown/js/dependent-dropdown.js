

// (function ($, Drupal, drupalSettings) {
//   Drupal.behaviors.depencydropdown = {
//     attach: function (context, settings) {

//       // Ensure drupalSettings exists
//       if (!settings.depencydropdown) {
//         console.log('❌ depencydropdown settings not found');
//         return;
//       }

//       var data = settings.depencydropdown;

//       // Debug: print data
//       console.log('✅ depencydropdown data:', data);

//       // Company dropdown change
//       $('#company-select', context).once('company-change').on('change', function () {
//         var companyId = $(this).val();
//         var journalSelect = $('#journal-select');
//         var roleSelect = $('#role-select');

//         // Clear dependent dropdowns
//         journalSelect.html('<option value="">Select journal</option>');
//         roleSelect.html('<option value="">Select role</option>');

//         // Populate journals
//         if (data.journals && Array.isArray(data.journals)) {
//           data.journals.forEach(function (journal) {
//             if (journal.parent == companyId) {
//               journalSelect.append('<option value="' + journal.tid + '">' + journal.name + '</option>');
//             }
//           });
//         }
//       });

//       // Journal dropdown change
//       $('#journal-select', context).once('journal-change').on('change', function () {
//         var journalId = $(this).val();
//         var roleSelect = $('#role-select');

//         // Clear roles
//         roleSelect.html('<option value="">Select role</option>');

//         // Populate roles
//         if (data.roles && Array.isArray(data.roles)) {
//           data.roles.forEach(function (role) {
//             if (role.parent == journalId) {
//               roleSelect.append('<option value="' + role.tid + '">' + role.name + '</option>');
//             }
//           });
//         }
//       });

//     }
//   };
// })(jQuery, Drupal, drupalSettings);

(function ($, Drupal) {
  Drupal.behaviors.depenceydropdown_test = {
    attach: function (context) {
      $(context).once('dep-test').each(function () {
        console.log("TEST: dependent-dropdown.js loaded and running.");
      });
    }
  };
})(jQuery, Drupal);



(function ($, Drupal) {

  Drupal.behaviors.depenceydropdown = {
    attach: function (context) {

      // PAGE LOAD ALERT (runs once)
      $(context).once('page-load-alert').each(function () {
        alert("Page loaded!");
        console.log("🔥 JS is now running.");
      });

      $('.dep-dropdown-init', context).once('dep-init').each(function () {

        const $company = $('#company-select');
        const $journal = $('#journal-select');
        const $role = $('#role-select');

        if (!$company.length || !$journal.length || !$role.length) {
          console.warn("⚠ Elements missing.");
          return;
        }

        // Company → Journals
        $company.on('change', function () {
          const id = $(this).val();

          $.ajax({
            url: `/depencey/journals/${id}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
              $journal.empty().append('<option value="">-- Select Journal --</option>');
              data.forEach(t => {
                $journal.append(`<option value="${t.tid}">${t.name}</option>`);
              });
            }
          });
        });

        // Journal → Roles
        $journal.on('change', function () {
          const id = $(this).val();

          $.ajax({
            url: `/depencey/roles/${id}`,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
              $role.empty().append('<option value="">-- Select Role --</option>');
              data.forEach(t => {
                $role.append(`<option value="${t.tid}">${t.name}</option>`);
              });
            }
          });
        });

      });
    }
  };

})(jQuery, Drupal);


// (function ($, Drupal) {

//   Drupal.behaviors.depenceydropdown = {
//     attach: function (context) {

//       $('.dep-dropdown-init', context).once('dep-init').each(function () {

//         const $company = $('#company-select');
//         const $journal = $('#journal-select');
//         const $role = $('#role-select');

//         if (!$company.length || !$journal.length || !$role.length) {
//           console.warn("⚠ Elements missing.");
//           return;
//         }

//         // Company → Journals
//         $company.on('change', function () {
//           const id = $(this).val();

//           $.ajax({
//             url: `/depencey/journals/${id}`,
//             type: 'GET',
//             dataType: 'json',
//             success: function (data) {
//               $journal.empty().append('<option value="">-- Select Journal --</option>');
//               data.forEach(t => {
//                 $journal.append(`<option value="${t.tid}">${t.name}</option>`);
//               });
//             }
//           });
//         });

//         // Journal → Roles
//         $journal.on('change', function () {
//           const id = $(this).val();

//           $.ajax({
//             url: `/depencey/roles/${id}`,
//             type: 'GET',
//             dataType: 'json',
//             success: function (data) {
//               $role.empty().append('<option value="">-- Select Role --</option>');
//               data.forEach(t => {
//                 $role.append(`<option value="${t.tid}">${t.name}</option>`);
//               });
//             }
//           });
//         });

//       });
//     }
//   };

// })(jQuery, Drupal);



// (function ($, Drupal, drupalSettings) {

//   Drupal.behaviors.depencydropdown = {
//     attach: function (context, settings) {

//       console.log("🔥 Dependent Dropdown JS Loaded (attach triggered)");

//       // Run only once
//       $('.dep-dropdown-init', context).once('depdropdown').each(function () {

//         console.log("🔄 Initializing dropdown behavior...");

//         let $company = $('#company-select');
//         let $journal = $('#journal-select');
//         let $role = $('#role-select');

//         console.log("📌 DOM Elements Found:", {
//           company: $company.length,
//           journal: $journal.length,
//           role: $role.length
//         });

//         if (!$company.length || !$journal.length || !$role.length) {
//           console.warn("⚠ Missing dropdown element. JS cannot proceed.");
//           return;
//         }

//         // When company is changed → load journals
//         $company.on('change', function () {
//           let companyId = $(this).val();
//           console.log("🏢 Company changed:", companyId);

//           $.ajax({
//             url: '/depencey/journals/' + companyId,
//             method: 'GET',
//             dataType: 'json',

//             beforeSend: function () {
//               console.log("⏳ Loading journals for company:", companyId);
//             },

//             success: function (response) {
//               console.log("✅ Journals Loaded:", response);

//               $journal.empty().append('<option value="">-- Select Journal --</option>');

//               $.each(response, function (idx, item) {
//                 $journal.append('<option value="' + item.tid + '">' + item.name + '</option>');
//               });

//               $journal.trigger('change');
//             },

//             error: function (xhr) {
//               console.error("❌ Error loading journals:", xhr.responseText);
//             }
//           });
//         });

//         // When journal is changed → load roles
//         $journal.on('change', function () {
//           let journalId = $(this).val();
//           console.log("📘 Journal changed:", journalId);

//           $.ajax({
//             url: '/depencey/roles/' + journalId,
//             method: 'GET',
//             dataType: 'json',

//             beforeSend: function () {
//               console.log("⏳ Loading roles for journal:", journalId);
//             },

//             success: function (response) {
//               console.log("✅ Roles Loaded:", response);

//               $role.empty().append('<option value="">-- Select Role --</option>');

//               $.each(response, function (idx, item) {
//                 $role.append('<option value="' + item.tid + '">' + item.name + '</option>');
//               });
//             },

//             error: function (xhr) {
//               console.error("❌ Error loading roles:", xhr.responseText);
//             }
//           });
//         });

//       });

//     }
//   };

// })(jQuery, Drupal, drupalSettings);
