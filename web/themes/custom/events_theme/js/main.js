console.log('Events JS loaded');

document.addEventListener('DOMContentLoaded', () => {
  const grid = document.getElementById('events-grid');

  if (!grid) {
    console.error('❌ events-grid not found in DOM');
    return;
  }

  fetch('/api/events/upcoming')
    .then(res => res.json())
    .then(events => {
      events.forEach(event => {
        const card = document.createElement('div');
        card.className = 'event-card';
        card.innerHTML = `
          <h3>${event.title}</h3>
          <p>${event.location}</p>
          <p>${event.category}</p>
        `;
        grid.appendChild(card);
      });
    });
});
