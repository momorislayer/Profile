const revealItems = document.querySelectorAll('[data-reveal]');
const siteNavigation = document.querySelector('.site-nav');
const menuToggle = document.querySelector('.menu-toggle');
const navigationLinks = document.querySelectorAll('.site-nav-links a');

if (siteNavigation && menuToggle) {
	const closeMenu = () => {
		siteNavigation.classList.remove('menu-open');
		menuToggle.setAttribute('aria-expanded', 'false');
		menuToggle.setAttribute('aria-label', 'Buka menu navigasi');
	};

	menuToggle.addEventListener('click', () => {
		const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
		siteNavigation.classList.toggle('menu-open', !isExpanded);
		menuToggle.setAttribute('aria-expanded', String(!isExpanded));
		menuToggle.setAttribute('aria-label', isExpanded ? 'Buka menu navigasi' : 'Tutup menu navigasi');
	});

	navigationLinks.forEach((link) => link.addEventListener('click', closeMenu));

	document.addEventListener('keydown', (event) => {
		if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
			closeMenu();
			menuToggle.focus();
		}
	});

	document.addEventListener('click', (event) => {
		if (!siteNavigation.contains(event.target)) closeMenu();
	});
}

if (revealItems.length && 'IntersectionObserver' in window) {
	document.documentElement.classList.add('motion-ready');

	const revealObserver = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			entry.target.classList.toggle('is-visible', entry.isIntersecting);
		});
	}, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

	revealItems.forEach((item) => {
		const delay = Number(item.dataset.delay) || 0;
		item.style.setProperty('--reveal-delay', `${delay}ms`);
		revealObserver.observe(item);
	});
} else {
	revealItems.forEach((item) => item.classList.add('is-visible'));
}
