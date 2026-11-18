/* =========================================================
   Allwin Cold Chain Solutions — interactions
   ========================================================= */
(function () {
    'use strict';

    var doc = document.documentElement;
    doc.classList.add('js');

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var $ = function (s, ctx) { return (ctx || document).querySelector(s); };
    var $$ = function (s, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(s)); };

    /* ---------- Year ---------- */
    var year = $('#year');
    if (year) year.textContent = new Date().getFullYear();

    /* ---------- Header: sticky state + scroll progress ---------- */
    var header = $('#header');
    var progress = document.createElement('span');
    progress.className = 'progress';
    header.appendChild(progress);

    /* ---------- Back to top ---------- */
    var toTop = document.createElement('button');
    toTop.className = 'to-top';
    toTop.setAttribute('aria-label', 'Back to top');
    toTop.innerHTML = '<svg><use href="#i-arrow"/></svg>';
    document.body.appendChild(toTop);
    toTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }); });

    /* ---------- Parallax targets ---------- */
    var mtFar = $('.hero__mountains .mt-far');
    var mtMid = $('.hero__mountains .mt-mid');
    var heroMedia = $('.hero__media'); // product image (tablet/mobile) reacts gently to the mouse
    var tempImg = $('.temp__img');
    var hero = $('.hero');

    var ticking = false;
    function onScroll() {
        var y = window.pageYOffset;
        var max = doc.scrollHeight - window.innerHeight;
        header.classList.toggle('is-scrolled', y > 10);
        progress.style.transform = 'scaleX(' + (max > 0 ? y / max : 0) + ')';
        toTop.classList.toggle('is-visible', y > 700);
        var wf = document.getElementById('waFloat');
        if (wf) {
            var show = y > 300;
            if (!show && wf.classList.contains('is-open')) { var wb = document.getElementById('waClose'); if (wb) wb.click(); }
            wf.classList.toggle('is-shown', show);
        }

        if (!reduceMotion) {
            if (hero && y < hero.offsetHeight + 200) {
                if (mtFar) mtFar.style.transform = 'translateY(' + (y * 0.18) + 'px)';
                if (mtMid) mtMid.style.transform = 'translateY(' + (y * 0.1) + 'px)';
            }
            if (tempImg && window.innerWidth > 991) {
                var r = tempImg.parentElement.getBoundingClientRect();
                if (r.bottom > 0 && r.top < window.innerHeight) {
                    var p = (r.top + r.height / 2 - window.innerHeight / 2) / window.innerHeight;
                    tempImg.style.translate = '0 ' + (p * -18).toFixed(1) + 'px';
                }
            }
        }
        updateActiveNav();
        ticking = false;
    }
    window.addEventListener('scroll', function () {
        if (!ticking) { window.requestAnimationFrame(onScroll); ticking = true; }
    }, { passive: true });

    /* ---------- Active nav link while scrolling ---------- */
    // var navLinks = $$('.nav__link');
    // var sectionMap = navLinks.map(function (a) {
    //     var id = a.getAttribute('href');
    //     return { link: a, el: id && id.length > 1 ? $(id) : null };
    // }).filter(function (o) { return o.el; });

    function updateActiveNav() {
        var mid = window.innerHeight * 0.35;
        var current = null;
        sectionMap.forEach(function (o) {
            var r = o.el.getBoundingClientRect();
            if (r.top <= mid && r.bottom > mid) current = o.link;
        });
        navLinks.forEach(function (a) { a.classList.toggle('is-active', a === current); });
    }

    /* ---------- Mobile nav ---------- */
    var burger = $('#burger');
    var nav = $('#nav');
    var overlay = document.createElement('div');
    overlay.className = 'nav-overlay';
    document.body.appendChild(overlay);
    var isMobile = function () { return window.innerWidth <= 1199; };

    function setNav(open) {
        nav.classList.toggle('is-open', open);
        burger.classList.toggle('is-active', open);
        overlay.classList.toggle('is-open', open);
        burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        document.body.classList.toggle('no-scroll', open);
    }
    burger.addEventListener('click', function () { setNav(!nav.classList.contains('is-open')); });
    overlay.addEventListener('click', function () { setNav(false); });

    $$('.has-drop > .nav__link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            if (!isMobile()) return;
            e.preventDefault();
            var item = link.parentElement;
            var drop = $('.drop', item);
            var open = !item.classList.contains('is-open');
            $$('.has-drop.is-open').forEach(function (other) {
                if (other !== item) { other.classList.remove('is-open'); $('.drop', other).style.maxHeight = ''; }
            });
            item.classList.toggle('is-open', open);
            drop.style.maxHeight = open ? drop.scrollHeight + 20 + 'px' : '';
        });
    });
    $$('.drop a, .nav__mobile-cta a').forEach(function (a) {
        a.addEventListener('click', function () { if (isMobile()) setNav(false); });
    });
    window.addEventListener('resize', function () {
        if (!isMobile() && nav.classList.contains('is-open')) setNav(false);
    });

    /* ---------- Scroll reveal ---------- */
    var animated = $$('[data-anim]');
    animated.forEach(function (el) {
        var d = el.getAttribute('data-delay');
        if (d) el.style.transitionDelay = d + 'ms';
    });

    function reveal(el) {
        el.classList.add('is-in');
        // once revealed, hand transforms back to the element's own hover styles
        var done = function (e) {
            if (e && e.target !== el) return;
            el.removeEventListener('transitionend', done);
            el.style.transitionDelay = '';
            el.removeAttribute('data-anim');
            el.classList.remove('is-in');
        };
        el.addEventListener('transitionend', done);
        setTimeout(done, 2200);
    }

    if ('IntersectionObserver' in window && !reduceMotion) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { reveal(entry.target); io.unobserve(entry.target); }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        animated.forEach(function (el) { io.observe(el); });
    } else {
        animated.forEach(function (el) { el.classList.add('is-in'); });
    }

    /* ---------- Counters ---------- */
    var counters = $$('[data-count]');
    function runCounter(el) {
        var target = parseInt(el.getAttribute('data-count'), 10);
        var dur = 1400;
        var start = null;
        function step(ts) {
            if (!start) start = ts;
            var t = Math.min((ts - start) / dur, 1);
            var eased = 1 - Math.pow(1 - t, 3);
            el.textContent = Math.round(target * eased);
            if (t < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }
    if ('IntersectionObserver' in window && !reduceMotion) {
        var cio = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { runCounter(entry.target); cio.unobserve(entry.target); }
            });
        }, { threshold: 0.6 });
        counters.forEach(function (el) { el.textContent = '0'; cio.observe(el); });
    }

    /* ---------- Snowfall in hero ---------- */
    var snow = $('.snow');
    if (snow && !reduceMotion) {
        var flakes = window.innerWidth < 768 ? 22 : 55;
        var frag = document.createDocumentFragment();
        for (var i = 0; i < flakes; i++) {
            var f = document.createElement('i');
            var size = (Math.random() * 4 + 2).toFixed(1);
            f.style.width = f.style.height = size + 'px';
            f.style.left = (Math.random() * 100).toFixed(2) + '%';
            f.style.opacity = (Math.random() * 0.5 + 0.4).toFixed(2);
            f.style.animationDuration = (Math.random() * 10 + 9).toFixed(1) + 's';
            f.style.animationDelay = (-Math.random() * 18).toFixed(1) + 's';
            f.style.setProperty('--drift', (Math.random() * 80 - 40).toFixed(0) + 'px');
            frag.appendChild(f);
        }
        snow.appendChild(frag);
    }

    /* ---------- Hero product: mouse parallax ---------- */
    if (hero && heroMedia && !reduceMotion && window.matchMedia('(hover: hover)').matches) {
        hero.addEventListener('mousemove', function (e) {
            var r = hero.getBoundingClientRect();
            var x = (e.clientX - r.left) / r.width - 0.5;
            var y = (e.clientY - r.top) / r.height - 0.5;
            heroMedia.style.translate = (x * -14).toFixed(1) + 'px ' + (y * -8).toFixed(1) + 'px';
        });
        hero.addEventListener('mouseleave', function () { heroMedia.style.translate = '0 0'; });
        heroMedia.style.transition = 'translate .8s cubic-bezier(.22,.61,.36,1)';
    }

    /* ---------- Client logo slider (infinite auto-scroll) ---------- */
    var track = $('.logos__track');
    if (track) {
        var originals = $$('.logos__item', track);
        var buildMarquee = function () {
            // reset to the original set
            $$('.logos__item[data-clone]', track).forEach(function (c) { c.remove(); });
            var viewport = track.parentElement.offsetWidth;
            var setWidth = track.scrollWidth;
            if (!setWidth) return;
            // repeat the set until one "half" is wider than the viewport
            var copies = Math.max(1, Math.ceil(viewport / setWidth));
            for (var c = 1; c < copies; c++) {
                originals.forEach(function (it) { track.appendChild(cloneLogo(it)); });
            }
            // duplicate the whole half so translateX(-50%) loops seamlessly
            $$('.logos__item', track).forEach(function (it) { track.appendChild(cloneLogo(it)); });
            var half = track.scrollWidth / 2;
            track.style.setProperty('--marquee-dur', Math.round(half / 60) + 's'); // ~60px per second
        };
        var cloneLogo = function (it) {
            var n = it.cloneNode(true);
            n.setAttribute('data-clone', '');
            n.setAttribute('aria-hidden', 'true');
            return n;
        };
        if (reduceMotion) {
            track.style.animation = 'none';
        } else {
            var imgs = $$('img', track);
            var pending = imgs.length;
            var go = function () { if (--pending <= 0) buildMarquee(); };
            imgs.forEach(function (im) {
                im.loading = 'eager';
                if (im.complete) go(); else { im.addEventListener('load', go); im.addEventListener('error', go); }
            });
            var rz;
            window.addEventListener('resize', function () { clearTimeout(rz); rz = setTimeout(buildMarquee, 250); });
        }
    }

    /* ---------- Quote forms (hero form + popup form) ---------- */
    var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    var phoneRe = /^[0-9+\s\-()]{7,16}$/;
    var modal = $('#quoteModal');
    var lastTrigger = null;

    var closeModal = function () {
        if (!modal || !modal.classList.contains('is-open')) return;
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('no-scroll');
        if (lastTrigger) lastTrigger.focus();
    };

    $$('form.form').forEach(function (form) {
        var msg = $('.form__msg', form);
        $$('select', form).forEach(function (s) {
            s.addEventListener('change', function () { s.classList.toggle('has-value', !!s.value); });
        });
        $$('input, textarea, select', form).forEach(function (f) {
            f.addEventListener('input', function () { f.classList.remove('is-invalid'); });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var firstBad = null;
            $$('[required]', form).forEach(function (f) {
                var v = f.value.trim();
                var bad = !v ||
                    (f.type === 'email' && !emailRe.test(v)) ||
                    (f.type === 'tel' && !phoneRe.test(v));
                f.classList.toggle('is-invalid', bad);
                if (bad && !firstBad) firstBad = f;
            });
            msg.className = 'form__msg';
            if (firstBad) {
                msg.textContent = 'Please fill in the required fields correctly.';
                msg.classList.add('err');
                firstBad.focus();
                return;
            }

            var btn = $('button[type="submit"]', form);
            var label = btn.innerHTML;
            btn.classList.add('is-loading');
            btn.disabled = true;
            btn.innerHTML = 'Sending… <svg><use href="#i-snow"/></svg>';
            var restore = function () {
                btn.classList.remove('is-loading');
                btn.disabled = false;
                btn.innerHTML = label;
            };

            var endpoint = (window.APP && APP.quoteUrl) || form.getAttribute('action');
            var token = (window.APP && APP.csrf) || (($('meta[name="csrf-token"]') || {}).content) || '';

            fetch(endpoint, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)   // includes _token and the hidden honeypot field
            })
                .then(function (res) {
                    return res.json().catch(function () { return {}; }).then(function (json) {
                        return { ok: res.ok, status: res.status, json: json };
                    });
                })
                .then(function (r) {
                    if (r.ok && r.json.success !== false) {
                        // success: go to the existing thank-you page
                        window.location.href = r.json.redirect || (window.APP && APP.thankYouUrl) || '/thank-you';
                        return;
                    }
                    restore();
                    var text;
                    if (r.status === 422 && r.json.errors) text = Object.values(r.json.errors)[0][0];
                    else if (r.status === 419) text = 'Session expired. Please refresh the page and try again.';
                    else text = r.json.message || 'Something went wrong. Please try again.';
                    msg.textContent = text;
                    msg.classList.add('err');
                })
                .catch(function () {
                    restore();
                    msg.textContent = 'Network error. Please try again.';
                    msg.classList.add('err');
                });
        });
    });

    /* ---------- Enquiry popup ---------- */
    if (modal) {
        var popupForm = $('form', modal);
        var openModal = function (trigger) {
            lastTrigger = trigger || null;
            var product = trigger && trigger.getAttribute('data-product');
            var sel = $('select[name="product"]', popupForm);
            if (product && sel) {
                sel.value = product;
                sel.classList.toggle('has-value', !!sel.value);
            }
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('no-scroll');
            setTimeout(function () { var f = $('input', popupForm); if (f) f.focus(); }, 250);
        };
        $$('[data-quote]').forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                if (nav.classList.contains('is-open')) setNav(false);
                openModal(el);
            });
        });
        $('.modal__close', modal).addEventListener('click', closeModal);
        modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (modal.classList.contains('is-open')) closeModal();
            else if (nav.classList.contains('is-open')) setNav(false);
        });
    }

    /* ---------- Testimonial slider: 2 cards per slide on desktop, 1 card on mobile ---------- */
    var tBox = $('#testimonial');
    if (tBox) {
        var tPages = $$('.testimonial__slide', tBox);
        var tCards = $$('.testimonial', tBox);
        var tDotsWrap = $('.testimonial__dots', tBox);
        var tMQ = window.matchMedia('(max-width: 767px)');
        var tIdx = 0, tTimer = null, tSingle = false, tDots = [];

        var tApply = function (dir) {
            var items = tSingle ? tCards : tPages;
            items.forEach(function (el, i) {
                el.classList.toggle('is-active', i === tIdx);
                el.classList.toggle('is-prev', i !== tIdx && (dir < 0 ? i > tIdx : i < tIdx));
                el.setAttribute('aria-hidden', i === tIdx ? 'false' : 'true');
            });
            tDots.forEach(function (d, i) { d.classList.toggle('is-active', i === tIdx); });
        };
        var tGo = function (n, dir) {
            var total = tSingle ? tCards.length : tPages.length;
            var next = (n + total) % total;
            if (next === tIdx) return;
            tIdx = next;
            tApply(dir);
        };
        var tNext = function () { tGo(tIdx + 1, 1); };
        var tPrev = function () { tGo(tIdx - 1, -1); };
        var tStop = function () { clearInterval(tTimer); };
        var tStart = function () { if (reduceMotion) return; tStop(); tTimer = setInterval(tNext, 6500); };

        var tBuild = function () {
            tSingle = tMQ.matches;
            tBox.classList.toggle('is-single', tSingle);
            tCards.forEach(function (c) { c.classList.remove('is-active', 'is-prev'); c.removeAttribute('aria-hidden'); });
            tPages.forEach(function (c) { c.classList.remove('is-active', 'is-prev'); c.removeAttribute('aria-hidden'); });
            var total = tSingle ? tCards.length : tPages.length;
            tDotsWrap.innerHTML = '';
            tDots = [];
            for (var i = 0; i < total; i++) {
                (function (n) {
                    var d = document.createElement('button');
                    d.type = 'button';
                    d.className = 'testimonial__dot';
                    d.setAttribute('aria-label', tSingle ? 'Show testimonial ' + (n + 1) : 'Show testimonials ' + (n * 2 + 1) + '–' + (n * 2 + 2));
                    d.addEventListener('click', function () { tGo(n, n < tIdx ? -1 : 1); tStart(); });
                    tDotsWrap.appendChild(d);
                    tDots.push(d);
                })(i);
            }
            tIdx = 0;
            tApply(1);
        };

        tBuild();
        if (tMQ.addEventListener) tMQ.addEventListener('change', function () { tBuild(); tStart(); });
        tBox.addEventListener('mouseenter', tStop);
        tBox.addEventListener('mouseleave', tStart);
        // swipe on touch screens
        var tx = 0;
        tBox.addEventListener('touchstart', function (e) { tx = e.touches[0].clientX; tStop(); }, { passive: true });
        tBox.addEventListener('touchend', function (e) {
            var dx = e.changedTouches[0].clientX - tx;
            if (Math.abs(dx) > 45) { dx < 0 ? tNext() : tPrev(); }
            tStart();
        }, { passive: true });
        tStart();
    }

    /* ---------- WhatsApp chat widget ---------- */
    var waFloat = $('#waFloat');
    if (waFloat) {
        var waBtn = $('#waBtn'), waBox = $('#waBox'), waForm = $('#waForm'), waText = $('#waText');
        var waPhone = $('#waPhone'), waWrap = $('#waPhoneWrap'), waList = $('#waList'), waCc = $('#waCc');
        var waErr = $('#waErr'), waFlag = $('#waFlag'), waCode = $('#waCode');
        var waNumber = '919687640805'; // the business number that receives the chat

        var countries = [
            ["in", "India", "+91"],
            ["ae", "United Arab Emirates", "+971"],
            ["us", "United States", "+1"],
            null,
            ["af", "Afghanistan", "+93"],
            ["ax", "Aland", "+358"],
            ["al", "Albania", "+355"],
            ["dz", "Algeria", "+213"],
            ["as", "American Samoa", "+1684"],
            ["ad", "Andorra", "+376"],
            ["ao", "Angola", "+244"],
            ["ai", "Anguilla", "+1264"],
            ["aq", "Antarctica", "+672"],
            ["ag", "Antigua and Barbuda", "+1268"],
            ["ar", "Argentina", "+54"],
            ["am", "Armenia", "+374"],
            ["aw", "Aruba", "+297"],
            ["au", "Australia", "+61"],
            ["at", "Austria", "+43"],
            ["az", "Azerbaijan", "+994"],
            ["bs", "Bahamas", "+1242"],
            ["bh", "Bahrain", "+973"],
            ["bd", "Bangladesh", "+880"],
            ["bb", "Barbados", "+1246"],
            ["by", "Belarus", "+375"],
            ["be", "Belgium", "+32"],
            ["bz", "Belize", "+501"],
            ["bj", "Benin", "+229"],
            ["bm", "Bermuda", "+1441"],
            ["bt", "Bhutan", "+975"],
            ["bo", "Bolivia", "+591"],
            ["bq", "Bonaire", "+5997"],
            ["ba", "Bosnia and Herzegovina", "+387"],
            ["bw", "Botswana", "+267"],
            ["bv", "Bouvet Island", "+47"],
            ["br", "Brazil", "+55"],
            ["io", "British Indian Ocean Territory", "+246"],
            ["vg", "British Virgin Islands", "+1284"],
            ["bn", "Brunei", "+673"],
            ["bg", "Bulgaria", "+359"],
            ["bf", "Burkina Faso", "+226"],
            ["bi", "Burundi", "+257"],
            ["cv", "Cabo Verde", "+238"],
            ["kh", "Cambodia", "+855"],
            ["cm", "Cameroon", "+237"],
            ["ca", "Canada", "+1"],
            ["ky", "Cayman Islands", "+1345"],
            ["cf", "Central African Republic", "+236"],
            ["td", "Chad", "+235"],
            ["cl", "Chile", "+56"],
            ["cn", "China", "+86"],
            ["cx", "Christmas Island", "+61"],
            ["cc", "Cocos (Keeling) Islands", "+61"],
            ["co", "Colombia", "+57"],
            ["km", "Comoros", "+269"],
            ["ck", "Cook Islands", "+682"],
            ["cr", "Costa Rica", "+506"],
            ["hr", "Croatia", "+385"],
            ["cu", "Cuba", "+53"],
            ["cw", "Curacao", "+5999"],
            ["cy", "Cyprus", "+357"],
            ["cz", "Czechia", "+420"],
            ["cd", "Democratic Republic of the Congo", "+243"],
            ["dk", "Denmark", "+45"],
            ["dj", "Djibouti", "+253"],
            ["dm", "Dominica", "+1767"],
            ["do", "Dominican Republic", "+1809"],
            ["tl", "East Timor", "+670"],
            ["ec", "Ecuador", "+593"],
            ["eg", "Egypt", "+20"],
            ["sv", "El Salvador", "+503"],
            ["gq", "Equatorial Guinea", "+240"],
            ["er", "Eritrea", "+291"],
            ["ee", "Estonia", "+372"],
            ["sz", "Eswatini", "+268"],
            ["et", "Ethiopia", "+251"],
            ["fk", "Falkland Islands", "+500"],
            ["fo", "Faroe Islands", "+298"],
            ["fj", "Fiji", "+679"],
            ["fi", "Finland", "+358"],
            ["fr", "France", "+33"],
            ["gf", "French Guiana", "+594"],
            ["pf", "French Polynesia", "+689"],
            ["tf", "French Southern Territories", "+262"],
            ["ga", "Gabon", "+241"],
            ["gm", "Gambia", "+220"],
            ["ge", "Georgia", "+995"],
            ["de", "Germany", "+49"],
            ["gh", "Ghana", "+233"],
            ["gi", "Gibraltar", "+350"],
            ["gr", "Greece", "+30"],
            ["gl", "Greenland", "+299"],
            ["gd", "Grenada", "+1473"],
            ["gp", "Guadeloupe", "+590"],
            ["gu", "Guam", "+1671"],
            ["gt", "Guatemala", "+502"],
            ["gg", "Guernsey", "+44"],
            ["gn", "Guinea", "+224"],
            ["gw", "Guinea-Bissau", "+245"],
            ["gy", "Guyana", "+592"],
            ["ht", "Haiti", "+509"],
            ["hm", "Heard Island and McDonald Islands", "+61"],
            ["hn", "Honduras", "+504"],
            ["hk", "Hong Kong", "+852"],
            ["hu", "Hungary", "+36"],
            ["is", "Iceland", "+354"],
            ["id", "Indonesia", "+62"],
            ["ir", "Iran", "+98"],
            ["iq", "Iraq", "+964"],
            ["ie", "Ireland", "+353"],
            ["im", "Isle of Man", "+44"],
            ["il", "Israel", "+972"],
            ["it", "Italy", "+39"],
            ["ci", "Ivory Coast", "+225"],
            ["jm", "Jamaica", "+1876"],
            ["jp", "Japan", "+81"],
            ["je", "Jersey", "+44"],
            ["jo", "Jordan", "+962"],
            ["kz", "Kazakhstan", "+7"],
            ["ke", "Kenya", "+254"],
            ["ki", "Kiribati", "+686"],
            ["xk", "Kosovo", "+377"],
            ["kw", "Kuwait", "+965"],
            ["kg", "Kyrgyzstan", "+996"],
            ["la", "Laos", "+856"],
            ["lv", "Latvia", "+371"],
            ["lb", "Lebanon", "+961"],
            ["ls", "Lesotho", "+266"],
            ["lr", "Liberia", "+231"],
            ["ly", "Libya", "+218"],
            ["li", "Liechtenstein", "+423"],
            ["lt", "Lithuania", "+370"],
            ["lu", "Luxembourg", "+352"],
            ["mo", "Macao", "+853"],
            ["mg", "Madagascar", "+261"],
            ["mw", "Malawi", "+265"],
            ["my", "Malaysia", "+60"],
            ["mv", "Maldives", "+960"],
            ["ml", "Mali", "+223"],
            ["mt", "Malta", "+356"],
            ["mh", "Marshall Islands", "+692"],
            ["mq", "Martinique", "+596"],
            ["mr", "Mauritania", "+222"],
            ["mu", "Mauritius", "+230"],
            ["yt", "Mayotte", "+262"],
            ["mx", "Mexico", "+52"],
            ["fm", "Micronesia", "+691"],
            ["md", "Moldova", "+373"],
            ["mc", "Monaco", "+377"],
            ["mn", "Mongolia", "+976"],
            ["me", "Montenegro", "+382"],
            ["ms", "Montserrat", "+1664"],
            ["ma", "Morocco", "+212"],
            ["mz", "Mozambique", "+258"],
            ["mm", "Myanmar", "+95"],
            ["na", "Namibia", "+264"],
            ["nr", "Nauru", "+674"],
            ["np", "Nepal", "+977"],
            ["nl", "Netherlands", "+31"],
            ["nc", "New Caledonia", "+687"],
            ["nz", "New Zealand", "+64"],
            ["ni", "Nicaragua", "+505"],
            ["ne", "Niger", "+227"],
            ["ng", "Nigeria", "+234"],
            ["nu", "Niue", "+683"],
            ["nf", "Norfolk Island", "+672"],
            ["kp", "North Korea", "+850"],
            ["mk", "North Macedonia", "+389"],
            ["mp", "Northern Mariana Islands", "+1670"],
            ["no", "Norway", "+47"],
            ["om", "Oman", "+968"],
            ["pk", "Pakistan", "+92"],
            ["pw", "Palau", "+680"],
            ["ps", "Palestine", "+970"],
            ["pa", "Panama", "+507"],
            ["pg", "Papua New Guinea", "+675"],
            ["py", "Paraguay", "+595"],
            ["pe", "Peru", "+51"],
            ["ph", "Philippines", "+63"],
            ["pn", "Pitcairn Islands", "+64"],
            ["pl", "Poland", "+48"],
            ["pt", "Portugal", "+351"],
            ["pr", "Puerto Rico", "+1787"],
            ["qa", "Qatar", "+974"],
            ["cg", "Republic of the Congo", "+242"],
            ["re", "Reunion", "+262"],
            ["ro", "Romania", "+40"],
            ["ru", "Russia", "+7"],
            ["rw", "Rwanda", "+250"],
            ["bl", "Saint Barthelemy", "+590"],
            ["sh", "Saint Helena", "+290"],
            ["kn", "Saint Kitts and Nevis", "+1869"],
            ["lc", "Saint Lucia", "+1758"],
            ["mf", "Saint Martin", "+590"],
            ["pm", "Saint Pierre and Miquelon", "+508"],
            ["vc", "Saint Vincent and the Grenadines", "+1784"],
            ["ws", "Samoa", "+685"],
            ["sm", "San Marino", "+378"],
            ["st", "Sao Tome and Principe", "+239"],
            ["sa", "Saudi Arabia", "+966"],
            ["sn", "Senegal", "+221"],
            ["rs", "Serbia", "+381"],
            ["sc", "Seychelles", "+248"],
            ["sl", "Sierra Leone", "+232"],
            ["sg", "Singapore", "+65"],
            ["sx", "Sint Maarten", "+1721"],
            ["sk", "Slovakia", "+421"],
            ["si", "Slovenia", "+386"],
            ["sb", "Solomon Islands", "+677"],
            ["so", "Somalia", "+252"],
            ["za", "South Africa", "+27"],
            ["gs", "South Georgia and the South Sandwich Islands", "+500"],
            ["kr", "South Korea", "+82"],
            ["ss", "South Sudan", "+211"],
            ["es", "Spain", "+34"],
            ["lk", "Sri Lanka", "+94"],
            ["sd", "Sudan", "+249"],
            ["sr", "Suriname", "+597"],
            ["sj", "Svalbard and Jan Mayen", "+4779"],
            ["se", "Sweden", "+46"],
            ["ch", "Switzerland", "+41"],
            ["sy", "Syria", "+963"],
            ["tw", "Taiwan", "+886"],
            ["tj", "Tajikistan", "+992"],
            ["tz", "Tanzania", "+255"],
            ["th", "Thailand", "+66"],
            ["tg", "Togo", "+228"],
            ["tk", "Tokelau", "+690"],
            ["to", "Tonga", "+676"],
            ["tt", "Trinidad and Tobago", "+1868"],
            ["tn", "Tunisia", "+216"],
            ["tm", "Turkmenistan", "+993"],
            ["tc", "Turks and Caicos Islands", "+1649"],
            ["tv", "Tuvalu", "+688"],
            ["tr", "Türkiye", "+90"],
            ["um", "U.S. Minor Outlying Islands", "+1"],
            ["vi", "U.S. Virgin Islands", "+1340"],
            ["ug", "Uganda", "+256"],
            ["ua", "Ukraine", "+380"],
            ["gb", "United Kingdom", "+44"],
            ["uy", "Uruguay", "+598"],
            ["uz", "Uzbekistan", "+998"],
            ["vu", "Vanuatu", "+678"],
            ["va", "Vatican City", "+379"],
            ["ve", "Venezuela", "+58"],
            ["vn", "Vietnam", "+84"],
            ["wf", "Wallis and Futuna", "+681"],
            ["eh", "Western Sahara", "+212"],
            ["ye", "Yemen", "+967"],
            ["zm", "Zambia", "+260"],
            ["zw", "Zimbabwe", "+263"]
        ];
        var cc = { flag: 'in', code: '+91' };

        countries.forEach(function (c) {
            var li = document.createElement('li');
            if (!c) { li.className = 'is-sep'; li.setAttribute('role', 'separator'); waList.appendChild(li); return; }
            li.setAttribute('role', 'option');
            li.dataset.flag = c[0]; li.dataset.code = c[2];
            li.innerHTML = '<img src="assets/flags/' + c[0] + '.webp" alt="" width="26" height="18" loading="lazy"><span>' + c[1] + '</span><em>' + c[2] + '</em>';
            li.dataset.q = (c[1] + ' ' + c[2]).toLowerCase();
            waList.appendChild(li);
        });

        var waPop = $('#waPop'), waSearch = $('#waSearch');
        var filterList = function () {
            var q = waSearch.value.trim().toLowerCase(), shown = 0;
            $$('li', waList).forEach(function (li) {
                if (li.classList.contains('is-sep')) { li.style.display = q ? 'none' : ''; return; }
                var hit = !q || li.dataset.q.indexOf(q) > -1;
                li.style.display = hit ? '' : 'none';
                if (hit) shown++;
            });
            waPop.classList.toggle('is-empty', shown === 0);
        };
        waSearch.addEventListener('input', filterList);
        var listSet = function (open) {
            waPop.classList.toggle('is-open', open);
            waCc.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (open) { waSearch.value = ''; filterList(); waList.scrollTop = 0; setTimeout(function () { waSearch.focus(); }, 60); }
        };
        waCc.addEventListener('click', function (e) { e.stopPropagation(); listSet(!waPop.classList.contains('is-open')); });
        waList.addEventListener('click', function (e) {
            var li = e.target.closest('li[data-code]');
            if (!li) return;
            cc = { flag: li.dataset.flag, code: li.dataset.code };
            waFlag.src = 'assets/flags/' + cc.flag + '.webp';
            waCode.textContent = cc.code;
            $$('li', waList).forEach(function (x) { x.classList.toggle('is-active', x === li); });
            listSet(false);
            waPhone.focus();
        });
        document.addEventListener('click', function (e) { if (!waWrap.contains(e.target)) listSet(false); });

        waPhone.addEventListener('input', function () {
            waPhone.value = waPhone.value.replace(/[^\d\s-]/g, '');
            waWrap.classList.remove('is-invalid'); waErr.textContent = '';
        });

        var waSet = function (open) {
            waFloat.classList.toggle('is-open', open);
            waBox.setAttribute('aria-hidden', open ? 'false' : 'true');
            waBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (!open) listSet(false);
            if (open) setTimeout(function () { waPhone.focus(); }, 300);
        };
        waBtn.addEventListener('click', function () { waSet(!waFloat.classList.contains('is-open')); });
        $('#waClose').addEventListener('click', function () { waSet(false); waBtn.focus(); });
        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (waPop.classList.contains('is-open')) listSet(false);
            else if (waFloat.classList.contains('is-open')) waSet(false);
        });
        document.addEventListener('click', function (e) {
            if (waFloat.classList.contains('is-open') && !waFloat.contains(e.target)) waSet(false);
        });

        waForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var digits = waPhone.value.replace(/\D/g, '');
            if (digits.length < 6 || digits.length > 14) {
                waWrap.classList.add('is-invalid');
                waErr.textContent = 'Please enter a valid mobile number.';
                waPhone.focus();
                return;
            }
            var msg = waText.value.trim() || 'Hello Allwin, I would like to enquire about cold chain packaging.';
            var text = msg + '\n\nMy mobile number: ' + cc.code + ' ' + digits;
            window.open('https://wa.me/' + waNumber + '?text=' + encodeURIComponent(text), '_blank', 'noopener');
            waPhone.value = ''; waText.value = '';
            waSet(false);
        });
    }

    onScroll();
})();
