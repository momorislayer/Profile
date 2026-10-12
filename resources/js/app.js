const revealItems = document.querySelectorAll('[data-reveal]');
const siteNavigation = document.querySelector('.site-nav');
const menuToggle = document.querySelector('.menu-toggle');
const navigationLinks = document.querySelectorAll('.site-nav-links a');
const splashScreen = document.querySelector('[data-splash-screen]');

const initializeRevealAnimations = () => {
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
};

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

if (splashScreen) {
	const splashStartedAt = performance.now();
	const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	splashScreen.hidden = false;

	if (reducedMotion) {
		splashScreen.remove();
		initializeRevealAnimations();
	} else {
		let dismissalStarted = false;

		const dismissSplash = () => {
			if (dismissalStarted) {
				return;
			}

			dismissalStarted = true;

			const minimumDuration = 1300;
			const remainingDuration = Math.max(0, minimumDuration - (performance.now() - splashStartedAt));

			window.setTimeout(() => {
				splashScreen.classList.add('is-leaving');
				window.setTimeout(() => {
					splashScreen.remove();
					initializeRevealAnimations();
				}, 650);
			}, remainingDuration);
		};

		const loadFallback = window.setTimeout(dismissSplash, 2200);

		if (document.readyState === 'complete') {
			window.clearTimeout(loadFallback);
			dismissSplash();
		} else {
			window.addEventListener('load', () => {
				window.clearTimeout(loadFallback);
				dismissSplash();
			}, { once: true });
		}
	}
} else {
	initializeRevealAnimations();
}
