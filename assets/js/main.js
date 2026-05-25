const toggleButton = document.getElementById('mobileToggle');
const mobileMenu = document.getElementById('mobileMenu');

toggleButton.addEventListener('click', () => {
  const isOpen = mobileMenu.classList.toggle('open');
  toggleButton.classList.toggle('open', isOpen);
  toggleButton.setAttribute('aria-expanded', isOpen);
});

mobileMenu.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', e => {
    if (link.id === 'mobileTitle2') {
      e.preventDefault();
      const mobileSubmenu = document.getElementById('mobileSubmenu');
      const isHidden = mobileSubmenu.style.display === 'none' || mobileSubmenu.style.display === '';
      mobileSubmenu.style.display = isHidden ? 'block' : 'none';
      return;
    }
    mobileMenu.classList.remove('open');
    toggleButton.classList.remove('open');
    toggleButton.setAttribute('aria-expanded', 'false');
  });
});

const contactForm = document.getElementById('formContact');
const successMessage = document.getElementById('msgSuccess');

contactForm.addEventListener('submit', e => {
  e.preventDefault();

  const name = document.getElementById('inputName').value.trim();
  const phone = document.getElementById('inputPhone').value.trim();
  const email = document.getElementById('inputEmail').value.trim();
  const message = document.getElementById('inputMessage').value.trim();

  if (!name || !phone || !email || !message) {
    alert('Please fill in all required fields.');
    return;
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    alert('Please enter a valid email address.');
    return;
  }

  const submitBtn = document.getElementById('btnSubmit');
  submitBtn.textContent = 'Sending…';
  submitBtn.disabled = true;

  setTimeout(() => {
    contactForm.reset();
    successMessage.style.display = 'block';
    submitBtn.textContent = 'Submit';
    submitBtn.disabled = false;

    setTimeout(() => { successMessage.style.display = 'none'; }, 5000);
  }, 900);
});

document.querySelectorAll('.main-nav li').forEach(li => {
  li.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') {
      const dropdown = li.querySelector('.dropdown-menu, .submenu');
      if (dropdown) {
        e.preventDefault();
        const isVisible = dropdown.style.visibility === 'visible';
        dropdown.style.visibility = isVisible ? 'hidden' : 'visible';
        dropdown.style.opacity = isVisible ? '0' : '1';
      }
    }
  });
});
