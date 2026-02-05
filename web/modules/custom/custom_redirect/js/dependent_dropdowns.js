// (function ($, Drupal) {
//   Drupal.behaviors.dependentDropdowns = {
//     attach: function (context, settings) {

//       alert("🔥 JS Loaded!");

//       $('#company-field', context).on('change', function () {
//         alert("🔥 Company Changed");
//       });

//       $('#journal-field', context).on('change', function () {
//         alert("🔥 Journal Changed");
//       });

//     }
//   };
// })(jQuery, Drupal);

// this js code is working get the id of all company

(function ($, Drupal) {
  'use strict';

  Drupal.behaviors.customRedirectDependentDelegated = {
    attach: function (context, settings) {

      // DEBUG: behavior attached each time.
      if (console && console.log) {
        console.log('customRedirectDependentDelegated.attach()', context);
      }

      // ---------- COMPANY ----------
      // Catch any select whose name contains field_company (covers typical Drupal names)
      $(document).off('change.customDepCompany', 'select[name*="field_company"], input[name*="field_company"]');

      // delegated change handler (works after AJAX replacements)
      $(document).on('change.customDepCompany', 'select[name*="field_company"], input[name*="field_company"]', function (e) {
        try {
          var $el = $(this);
          var value = $el.val();

          // If it's an autocomplete input and you have a hidden target_id, try to read it:
          if ($el.is('input') && !value) {
            // try hidden target id pattern: field_company[0][target_id]
            var name = $el.attr('name') || '';
            var hid = $('input[name="' + name.replace(/\[value\]*/,'') + '[0][target_id]"]');
            if (hid.length) { value = hid.val(); }
          }

          console.log('Company changed (delegated) ->', value, this);
          alert('Company changed → ' + value);

          // TODO: trigger AJAX call here to load journals, or let Drupal AJAX callback handle it.

        } catch (err) {
          console.error('Company handler error', err);
        }
      });

      // Also catch click/focus/open on SELECT (user opening dropdown)
      $(document).off('click.customDepCompanyOpen', 'select[name*="field_company"]');
      $(document).on('click.customDepCompanyOpen', 'select[name*="field_company"]', function (e) {
        console.log('Company select clicked/opened', this);
        // optional: alert('Company opened');
      });


      // ---------- JOURNAL ----------
      $(document).off('change.customDepJournal', 'select[name*="field_journal"], input[name*="field_journal"]');
      $(document).on('change.customDepJournal', 'select[name*="field_journal"], input[name*="field_journal"]', function (e) {
        try {
          var $el = $(this);
          var value = $el.val();
          if ($el.is('input') && !value) {
            var name = $el.attr('name') || '';
            var hid = $('input[name="' + name.replace(/\[value\]*/,'') + '[0][target_id]"]');
            if (hid.length) { value = hid.val(); }
          }
          console.log('Journal changed (delegated) ->', value, this);
          alert('Journal changed → ' + value);
        } catch (err) {
          console.error('Journal handler error', err);
        }
      });

      $(document).off('click.customDepJournalOpen', 'select[name*="field_journal"]');
      $(document).on('click.customDepJournalOpen', 'select[name*="field_journal"]', function (e) {
        console.log('Journal select clicked/opened', this);
      });


      // ---------- ROLE (optional) ----------
      $(document).off('change.customDepRole', 'select[name*="field_role"], input[name*="field_role"]');
      $(document).on('change.customDepRole', 'select[name*="field_role"], input[name*="field_role"]', function (e) {
        console.log('Role changed ->', $(this).val(), this);
      });

    } // attach
  };

})(jQuery, Drupal);



// (function ($, Drupal) {

//   Drupal.behaviors.dependentJournalFilter = {
//     attach: function (context, settings) {

//       console.log("🔥 Behavior attached");

//       // Delegated event for company dropdown
//       $(document).off('change.companyFilter', 'select[name*="field_company"]');
//       $(document).on('change.companyFilter', 'select[name*="field_company"]', function () {

//         var company_tid = $(this).val(); // Selected company
//         console.log("Selected company:", company_tid);

//         var $journalSelect = $('select[name*="field_journal"]');

//         if (!$journalSelect.length) {
//           console.error("⚠ Journal dropdown not found!");
//           return;
//         }

//         // Reset journal selection
//         $journalSelect.val('');

//         // Hide ALL journal options
//         $journalSelect.find('option').hide();

//         // Always show placeholder (- None -)
//         $journalSelect.find('option[value=""]').show();

//         // Show journals belonging to selected company
//         $journalSelect.find('option[data-company="' + company_tid + '"]').show();

//       });

//     }
//   };

// })(jQuery, Drupal);


// (function ($, Drupal) {

//   Drupal.behaviors.dependentJournalFilter = {
//     attach: function (context, settings) {

//       console.log("🔥 Behavior attached");

//       $(document).off('change.companyFilter', 'select[name*="field_company"]');
//       $(document).on('change.companyFilter', 'select[name*="field_company"]', function () {

//         var company_tid = $(this).val();
//         var $journal = $('select[name*="field_journal"]');

//         console.log("Selected company:", company_tid);

//         // Reset journal to default
//         $journal.val('');

//         // 👉 Case 1: Company A = 92 → filter journals
//         if (company_tid == "92") {

//           console.log("Filtering Journals for Company A");

//           $journal.find('option').hide();      // hide all
//           $journal.find('option[value=""]').show(); // show None
          
//           // show only Company-A journals
//           $journal.find('option[data-company="92"]').show();

//         } else {
//           // 👉 Case 2: Company B / C / D → show ALL
          
//           console.log("No filter → Showing all journals");

//           $journal.find('option').show();
//         }
//       });

//     }
//   };

// })(jQuery, Drupal);


// (function ($, Drupal) {
//   Drupal.behaviors.companyJournalFilter = {
//     attach: function (context, settings) {

//       const $company = $('select[name*="field_company"]', context);
//       const $journal = $('select[name*="field_journal"]', context);

//       if (!$company.length || !$journal.length) {
//         return;
//       }

//       // When company changes → filter journals
//       $company.once('companyChange').on('change', function () {
//         const selectedCompany = $(this).val();

//         // Show all options initially
//         $journal.find('option').show();

//         // Hide journals not matching selected company
//         $journal.find('option').each(function () {
//           const journalCompany = $(this).data('company');

//           // Skip "None"
//           if (!journalCompany) return;

//           if (journalCompany != selectedCompany) {
//             $(this).hide();
//           }
//         });

//         // Reset journal select
//         $journal.val('');
//       });

//     }
//   };
// })(jQuery, Drupal);
