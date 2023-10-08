<script>

document.addEventListener('DOMContentLoaded', () => {


  /*** Navbar Menu Bulma: https://bulma.io/documentation/components/navbar/#navbar-menu ***/
  
  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });



  /*** Notification Close Bulma: https://bulma.io/documentation/elements/notification/#javascript-example ***/

  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });



  /*** Modal Bulma: https://bulma.io/documentation/components/modal ***/

  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add('is-active');
  }

  function closeModal($el) {
    $el.classList.remove('is-active');
  }

  function closeAllModals() {
    (document.querySelectorAll('.modal') || []).forEach(($modal) => {
      closeModal($modal);
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener('click', (e) => {

      if(e.target.tagName == 'A')
      {
        e.preventDefault()
      }

      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button, .button-modal-close') || []).forEach(($close) => {
    const $target = $close.closest('.modal');

    $close.addEventListener('click', () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener('keydown', (event) => {
    if (event.code === 'Escape') {
      closeAllModals();
    }
  });



  /*** Tabs Bulma: https://bulma.io/documentation/components/tabs/ ***/
  
  const tabsContent = document.querySelectorAll('.tabs-content > div');

  document.querySelectorAll('.tabs a[data-content]').forEach( ($target) => {
    let content_id = $target.dataset.content;

    $target.addEventListener('click', (event) => {

      $target.closest('ul').querySelectorAll('li').forEach( (li) => {

        li.classList.toggle(
          'is-active',
          (li.querySelector('a').dataset.content == content_id)
        )

      })

      tabsContent.forEach((div) => div.classList.toggle('is-hidden', div.id != content_id))
    })
  });
   
  
  /*** Dropdowns Bulma: https://bulma.io/documentation/components/dropdown/ ***/

  (document.querySelectorAll('.dropdown:not(.is-hoverable)') || []).forEach(($dropdown) => {
    $dropdown.addEventListener('click', (e) => {
      e.preventDefault()

      e.target.closest('.dropdown').classList.toggle('is-active')
      
    })
  })


});
</script>
