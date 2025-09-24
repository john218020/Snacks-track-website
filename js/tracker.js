// js/tracker.js
(function(){
  // Track every page view
  fetch('tracker.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      page: window.location.href,
      userAgent: navigator.userAgent
    })
  }).catch(()=>{});

  // Track order button clicks
  document.addEventListener('click', function(e){
    var btn = e.target.closest && e.target.closest('.order-btn');
    if(!btn) return;
    var pid = btn.dataset.productId || 0;
    fetch('cart.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({ productId: pid, action: 'add' })
    }).catch(()=>{});
    alert('Tracked Order Click — Product ID: ' + pid);
  });
})();
