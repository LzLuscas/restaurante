const chk = document.getElementById('chk');

function applyTheme() {
  const darkMode = localStorage.getItem('darkMode');
  if (darkMode === 'enabled') {
    document.body.classList.add('dark');
    chk.checked = true;
  } else {
    document.body.classList.remove('dark');
    chk.checked = false;
  }
}

window.addEventListener('load', applyTheme);

chk.addEventListener('change', () => {
  document.body.classList.toggle('dark');
  if (document.body.classList.contains('dark')) {
    localStorage.setItem('darkMode', 'enabled');
  } else {
    localStorage.setItem('darkMode', 'disabled');
  }
});
