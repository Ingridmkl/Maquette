document.querySelectorAll('.navMenu a').forEach((link, index) => {
    link.addEventListener('mouseover', () => {
      const dot = document.querySelector('.navMenu .dot');
      const linkCenter = link.offsetLeft + link.offsetWidth / 2;
      dot.style.opacity = 1;
      dot.style.transform = `translateX(${linkCenter}px)`;
    });
    link.addEventListener('mouseout', () => {
      const dot = document.querySelector('.navMenu .dot');
      dot.style.opacity = 0;
    });
  });