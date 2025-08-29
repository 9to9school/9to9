@extends('layouts.web')
@section('body')
<script type="text/javascript">
        var gk_isXlsx = false;
        var gk_xlsxFileLookup = {};
        var gk_fileData = {};
        function filledCell(cell) {
          return cell !== '' && cell != null;
        }
        function loadFileData(filename) {
        if (gk_isXlsx && gk_xlsxFileLookup[filename]) {
            try {
                var workbook = XLSX.read(gk_fileData[filename], { type: 'base64' });
                var firstSheetName = workbook.SheetNames[0];
                var worksheet = workbook.Sheets[firstSheetName];

                // Convert sheet to JSON to filter blank rows
                var jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, blankrows: false, defval: '' });
                // Filter out blank rows (rows where all cells are empty, null, or undefined)
                var filteredData = jsonData.filter(row => row.some(filledCell));

                // Heuristic to find the header row by ignoring rows with fewer filled cells than the next row
                var headerRowIndex = filteredData.findIndex((row, index) =>
                  row.filter(filledCell).length >= filteredData[index + 1]?.filter(filledCell).length
                );
                // Fallback
                if (headerRowIndex === -1 || headerRowIndex > 25) {
                  headerRowIndex = 0;
                }

                // Convert filtered JSON back to CSV
                var csv = XLSX.utils.aoa_to_sheet(filteredData.slice(headerRowIndex)); // Create a new sheet from filtered array of arrays
                csv = XLSX.utils.sheet_to_csv(csv, { header: 1 });
                return csv;
            } catch (e) {
                console.error(e);
                return "";
            }
        }
        return gk_fileData[filename] || "";
        }
        </script>


    <!-- Inter font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Tailwind config
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] },
            colors: {
              brand: {
                50: '#f0f6ff',
                100: '#e0edff',
                200: '#c7dbff',
                300: '#a3c2ff',
                400: '#7aa3ff',
                500: '#5c85ff',
                600: '#4369e6',
                700: '#2e4ecc',
                800: '#233ca6',
                900: '#1a2c7a'
              },
              accent: {
                50: '#ecfdf5',
                500: '#10b981',
                600: '#059669'
              }
            },
            boxShadow: {
              soft: '0 8px 24px -6px rgba(0,0,0,0.1)',
              glow: '0 0 20px -5px rgba(92,133,255,0.3)'
            },
            animation: {
              'fade-in': 'fadeIn 0.5s ease-out',
              'scale-in': 'scaleIn 0.3s ease-out',
              'slide-up': 'slideUp 0.5s ease-out',
              'pulse-glow': 'pulseGlow 2s ease-in-out infinite'
            },
            keyframes: {
              fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
              scaleIn: { '0%': { transform: 'scale(0.95)' }, '100%': { transform: 'scale(1)' } },
              slideUp: { '0%': { transform: 'translateY(20px)', opacity: '0' }, '100%': { transform: 'translateY(0)', opacity: '1' } },
              pulseGlow: { '0%, 100%': { boxShadow: '0 0 10px -2px rgba(92,133,255,0.3)' }, '50%': { boxShadow: '0 0 20px -2px rgba(92,133,255,0.5)' } }
            }
          }
        }
      }
    </script>

    <style>
      :root { color-scheme: light dark; }
      html, body { height: 100%; }
      .bg-grid {
        background-image: radial-gradient(rgba(92,133,255,0.2) 1px, transparent 1px);
        background-size: 20px 20px;
        background-position: center;
      }
      @media (prefers-reduced-motion: no-preference) {
        .animate-on-scroll { animation: slideUp 0.5s ease-out both; }
      }
    </style>

    <script>
      // Persisted dark mode
      const theme = localStorage.getItem('theme');
      if (theme === 'dark') document.documentElement.classList.add('dark');
      // Scroll animation trigger
      document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('animate-on-scroll');
              observer.unobserve(entry.target);
            }
          });
        }, { threshold: 0.1 });
        document.querySelectorAll('section, .card, .timeline-item').forEach(el => observer.observe(el));
      });
    </script>


  <div class="bg-white text-slate-800 dark:bg-slate-950 dark:text-slate-100 font-sans antialiased">
    <!-- NAVBAR -->
    <!-- <header class="sticky top-0 z-50 backdrop-blur supports-[backdrop-filter]:bg-white/80 bg-white/95 dark:bg-slate-950/90 border-b border-slate-200/50 dark:border-slate-800/50">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <a href="#top" class="flex items-center gap-3 font-extrabold text-xl tracking-tight transition-transform hover:scale-105">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white shadow-soft">SC</span>
            <span>School CRM</span>
          </a>
          <nav class="hidden md:flex items-center gap-8 text-sm font-semibold">
            <a href="#benefits" class="hover:text-brand-500 transition-colors">Benefits</a>
            <a href="#features" class="hover:text-brand-500 transition-colors">CRM Features</a>
            <a href="#tiers" class="hover:text-brand-500 transition-colors">Partner Tiers</a>
            <a href="#process" class="hover:text-brand-500 transition-colors">Process</a>
            <a href="#faq" class="hover:text-brand-500 transition-colors">FAQ</a>
          </nav>
          <div class="flex items-center gap-3">
            <button id="themeToggle" class="p-2 rounded-full hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors" aria-label="Toggle dark mode">
              <svg id="sun" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden dark:inline" viewBox="0 0 24 24" fill="currentColor"><path d="M6.76 4.84l-1.8-1.79-1.41 1.41 1.79 1.8 1.42-1.42zm10.48 0l1.79-1.79 1.41 1.41-1.79 1.8-1.41-1.42zM12 4V1h-0v3h0zm0 19v-3h0v3h0zM4 12H1v0h3v0zm19 0h-3v0h3v0zM6.76 19.16l-1.42 1.42-1.79-1.8 1.41-1.41 1.8 1.79zM19.16 19.16l1.8 1.79 1.41-1.41-1.79-1.8-1.42 1.42z"/><circle cx="12" cy="12" r="5"/></svg>
              <svg id="moon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:hidden" viewBox="0 0 24 24" fill="currentColor"><path d="M21.64 13a9 9 0 1 1-10.63-10 1 1 0 0 0-1.17 1.49A7 7 0 1 0 20.15 14.8a1 1 0 0 0 1.49-1.17Z"/></svg>
            </button>
            <a href="#apply" class="hidden sm:inline-flex items-center rounded-full bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white shadow-soft hover:bg-brand-700 transition-all hover:scale-105">Apply Now</a>
            <button id="menuBtn" class="md:hidden p-2 rounded-full hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors" aria-label="Open menu">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
          </div>
        </div>
        <div id="mobileNav" class="md:hidden hidden pb-4 animate-fade-in">
          <nav class="grid gap-2 text-sm font-semibold">
            <a href="#benefits" class="px-4 py-2 rounded-lg hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors">Benefits</a>
            <a href="#features" class="px-4 py-2 rounded-lg hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors">CRM Features</a>
            <a href="#tiers" class="px-4 py-2 rounded-lg hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors">Partner Tiers</a>
            <a href="#process" class="px-4 py-2 rounded-lg hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors">Process</a>
            <a href="#faq" class="px-4 py-2 rounded-lg hover:bg-brand-100 dark:hover:bg-brand-900/30 transition-colors">FAQ</a>
            <a href="#apply" class="px-4 py-2 rounded-lg bg-brand-600 text-white hover:bg-brand-700 transition-colors">Apply Now</a>
          </nav>
        </div>
      </div>
    </header> -->

    <!-- HERO -->
    <section class="relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-brand-50 to-transparent dark:from-brand-900/20"></div>
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
          <div class="space-y-6">
            <span class="inline-flex items-center gap-2 rounded-full border border-accent-500/30 bg-accent-50 dark:bg-accent-900/20 px-3 py-1 text-xs font-medium text-accent-600 dark:text-accent-300 animate-scale-in">
              <span class="h-2 w-2 rounded-full bg-accent-500"></span> Now Accepting Applications
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">
              Become a <span class="text-brand-600">School CRM</span> Partner
            </h1>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-xl">Grow your business with our all-in-one CRM for schools. Earn up to 35% commissions, access co-marketing, and enjoy priority support.</p>
            <div class="flex flex-wrap gap-4">
              <a href="#apply" class="inline-flex items-center rounded-full bg-brand-600 px-6 py-3 text-white font-semibold shadow-soft hover:bg-brand-700 transition-all hover:scale-105 animate-scale-in">Apply Now</a>
              <a href="#tiers" class="inline-flex items-center rounded-full border border-slate-300 dark:border-slate-700 px-6 py-3 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all hover:scale-105">View Partner Tiers</a>
              <a href="#brochure" class="inline-flex items-center rounded-full border border-slate-300 dark:border-slate-700 px-6 py-3 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all hover:scale-105">Download Brochure</a>
            </div>
            <dl class="grid grid-cols-3 gap-6 max-w-xl text-center">
              <div class="animate-on-scroll">
                <dt class="text-sm text-slate-500">Avg. Partner ROI</dt>
                <dd class="text-2xl font-bold text-brand-600">4.6×</dd>
              </div>
              <div class="animate-on-scroll">
                <dt class="text-sm text-slate-500">Schools Onboarded</dt>
                <dd class="text-2xl font-bold text-brand-600">2,100+</dd>
              </div>
              <div class="animate-on-scroll">
                <dt class="text-sm text-slate-500">Payout Time</dt>
                <dd class="text-2xl font-bold text-brand-600">15 Days</dd>
              </div>
            </dl>
          </div>
          <div class="relative">
            <div class="rounded-2xl border border-slate-200/50 dark:border-slate-800/50 bg-white/80 dark:bg-slate-900/70 backdrop-blur-lg p-6 shadow-glow animate-scale-in">
              <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=1400&auto=format&fit=crop" alt="Dashboard preview" class="rounded-xl object-cover aspect-[4/3] w-full">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- TRUST BAR -->
    <section aria-label="Trusted by" class="border-y border-slate-200/50 dark:border-slate-800/50 bg-grid py-8">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-medium text-slate-500">Trusted by 2,000+ Institutions Worldwide</p>
        <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-6 opacity-80">
          <div class="h-10 rounded bg-slate-200/50 dark:bg-slate-800/50 animate-pulse"></div>
          <div class="h-10 rounded bg-slate-200/50 dark:bg-slate-800/50 animate-pulse"></div>
          <div class="h-10 rounded bg-slate-200/50 dark:bg-slate-800/50 animate-pulse"></div>
          <div class="h-10 rounded bg-slate-200/50 dark:bg-slate-800/50 animate-pulse"></div>
          <div class="h-10 rounded bg-slate-200/50 dark:bg-slate-800/50 animate-pulse"></div>
          <div class="h-10 rounded bg-slate-200/50 dark:bg-slate-800/50 animate-pulse"></div>
        </div>
      </div>
    </section>

    <!-- PARTNER BENEFITS -->
    <section id="benefits" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
      <div class="grid lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-5">
          <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">Why Partner With Us?</h2>
          <p class="mt-4 text-lg text-slate-600 dark:text-slate-300">Our partner-first approach offers transparent commissions, marketing support, and seamless onboarding to help you succeed.</p>
          <ul class="mt-6 space-y-4 text-sm font-medium">
            <li class="flex gap-3"><span class="mt-1 h-3 w-3 rounded-full bg-accent-500"></span> Up to 35% recurring commission</li>
            <li class="flex gap-3"><span class="mt-1 h-3 w-3 rounded-full bg-accent-500"></span> Deal registration & territory protection</li>
            <li class="flex gap-3"><span class="mt-1 h-3 w-3 rounded-full bg-accent-500"></span> MDF for events & co-marketing</li>
            <li class="flex gap-3"><span class="mt-1 h-3 w-3 rounded-full bg-accent-500"></span> Dedicated partner success manager</li>
            <li class="flex gap-3"><span class="mt-1 h-3 w-3 rounded-full bg-accent-500"></span> Priority L2 support & engineering</li>
          </ul>
        </div>
        <div class="lg:col-span-7 grid sm:grid-cols-2 gap-6">
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <div class="h-12 w-12 rounded-xl bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-300 flex items-center justify-center text-2xl">💸</div>
            <h3 class="mt-4 text-lg font-semibold">Transparent Payouts</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Track commissions in real-time and get paid within 15 days.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <div class="h-12 w-12 rounded-xl bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-300 flex items-center justify-center text-2xl">🎓</div>
            <h3 class="mt-4 text-lg font-semibold">Enablement & Training</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Access sales playbooks, certifications, and live bootcamps.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <div class="h-12 w-12 rounded-xl bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-300 flex items-center justify-center text-2xl">🤝</div>
            <h3 class="mt-4 text-lg font-semibold">Co-Selling Support</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Collaborate with our team on discovery and proposals.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <div class="h-12 w-12 rounded-xl bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-300 flex items-center justify-center text-2xl">🔒</div>
            <h3 class="mt-4 text-lg font-semibold">Security & Compliance</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">SOC2-compliant with regional data residency options.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CRM FEATURES -->
    <section id="features" class="bg-slate-50/50 dark:bg-slate-900/20 border-y border-slate-200/50 dark:border-slate-800/50">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-end justify-between gap-6">
          <div>
            <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">All-in-One School CRM</h2>
            <p class="mt-3 text-lg text-slate-600 dark:text-slate-300">Comprehensive tools for schools, from leads to alumni engagement.</p>
          </div>
          <a href="#apply" class="hidden sm:inline-flex items-center rounded-full border border-slate-300 dark:border-slate-700 px-5 py-2.5 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all hover:scale-105">Get a Partner Sandbox</a>
        </div>
        <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-950 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <h3 class="text-lg font-semibold">Lead & Enquiry Management</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Automate lead capture, scoring, and nurturing from multiple channels.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-950 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <h3 class="text-lg font-semibold">Admissions & Enrollment</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Streamline applications, interviews, and seat allocation.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-950 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <h3 class="text-lg font-semibold">Fees & Payments</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Manage payment plans, reminders, and analytics.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-950 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <h3 class="text-lg font-semibold">Attendance & Timetable</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Integrate RFID/biometrics and automate schedules.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-950 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <h3 class="text-lg font-semibold">Communications</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Run email, SMS, and WhatsApp campaigns with ease.</p>
          </div>
          <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-950 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
            <h3 class="text-lg font-semibold">Analytics & Reports</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Access funnel, retention, and exportable dashboards.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- PARTNER TIERS -->
    <section id="tiers" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
      <div class="text-center max-w-2xl mx-auto">
        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">Partner Tiers That Grow With You</h2>
        <p class="mt-3 text-lg text-slate-600 dark:text-slate-300">Choose your partnership model—referral, reseller, or strategic ISV.</p>
      </div>
      <div class="mt-10 grid md:grid-cols-3 gap-6">
        <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">Referral</h3>
            <span class="text-xs rounded-full bg-accent-100 text-accent-600 dark:bg-accent-900/30 dark:text-accent-300 px-3 py-1">Fast Start</span>
          </div>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Refer qualified leads and let us handle the rest.</p>
          <div class="mt-4 text-3xl font-bold text-brand-600">10–15% <span class="text-base font-medium text-slate-500">commission</span></div>
          <ul class="mt-4 space-y-3 text-sm">
            <li>• Deal registration portal</li>
            <li>• Quarterly payouts</li>
            <li>• Co-branded assets</li>
          </ul>
          <a href="#apply" class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-5 py-3 font-semibold hover:opacity-90 transition-all">Apply as Referral</a>
        </div>
        <div class="card rounded-2xl border-2 border-brand-600 p-6 bg-white dark:bg-slate-900 shadow-glow relative">
          <span class="absolute -top-3 right-6 rounded-full bg-brand-600 text-white text-xs font-semibold px-3 py-1">Most Popular</span>
          <h3 class="text-lg font-semibold">Reseller</h3>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Own the sales cycle with our support.</p>
          <div class="mt-4 text-3xl font-bold text-brand-600">20–30% <span class="text-base font-medium text-slate-500">commission</span></div>
          <ul class="mt-4 space-y-3 text-sm">
            <li>• Territory protection</li>
            <li>• MDF + joint events</li>
            <li>• L2 partner support</li>
          </ul>
          <a href="#apply" class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-brand-600 text-white px-5 py-3 font-semibold hover:bg-brand-700 transition-all">Apply as Reseller</a>
        </div>
        <div class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1">
          <h3 class="text-lg font-semibold">Strategic ISV</h3>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Build and sell integrations for our marketplace.</p>
          <div class="mt-4 text-3xl font-bold text-brand-600">Rev-Share <span class="text-base font-medium text-slate-500">up to 35%</span></div>
          <ul class="mt-4 space-y-3 text-sm">
            <li>• API access & sandbox</li>
            <li>• Marketplace listing</li>
            <li>• Co-marketing & launch</li>
          </ul>
          <a href="#apply" class="mt-6 inline-flex w-full items-center justify-center rounded-full border border-slate-300 dark:border-slate-700 px-5 py-3 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all">Apply as ISV</a>
        </div>
      </div>
    </section>

    <!-- PROCESS / TIMELINE -->
    <section id="process" class="bg-gradient-to-b from-slate-50/50 to-white dark:from-slate-900/20 dark:to-slate-950 border-y border-slate-200/50 dark:border-slate-800/50">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-center tracking-tight">How It Works</h2>
        <p class="mt-3 text-lg text-center text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">Join our partner program in five simple steps and start growing your business.</p>
        <div class="mt-12 grid md:grid-cols-5 gap-6 max-w-5xl mx-auto">
          <div class="timeline-item relative p-6 rounded-2xl bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1 group">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 h-8 w-8 rounded-full bg-brand-600 text-white flex items-center justify-center text-sm font-bold group-hover:animate-pulse-glow">1</div>
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-center">Apply</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300 text-center">Submit your business and market details.</p>
          </div>
          <div class="timeline-item relative p-6 rounded-2xl bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1 group">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 h-8 w-8 rounded-full bg-brand-600 text-white flex items-center justify-center text-sm font-bold group-hover:animate-pulse-glow">2</div>
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-center">Screening</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300 text-center">We review your fit and market coverage.</p>
          </div>
          <div class="timeline-item relative p-6 rounded-2xl bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1 group">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 h-8 w-8 rounded-full bg-brand-600 text-white flex items-center justify-center text-sm font-bold group-hover:animate-pulse-glow">3</div>
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-center">Onboarding</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300 text-center">Access demo tenants and partner portals.</p>
          </div>
          <div class="timeline-item relative p-6 rounded-2xl bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1 group">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 h-8 w-8 rounded-full bg-brand-600 text-white flex items-center justify-center text-sm font-bold group-hover:animate-pulse-glow">4</div>
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-center">Go-to-Market</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300 text-center">Launch campaigns and co-sell with us.</p>
          </div>
          <div class="timeline-item relative p-6 rounded-2xl bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all hover:-translate-y-1 group">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 h-8 w-8 rounded-full bg-brand-600 text-white flex items-center justify-center text-sm font-bold group-hover:animate-pulse-glow">5</div>
            <div class="flex justify-center mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-center">Earn & Grow</h3>
            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300 text-center">Earn commissions and unlock higher tiers.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- APPLICATION FORM -->
    <section id="apply" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight">Partner Application</h2>
        <p class="mt-3 text-lg text-slate-600 dark:text-slate-300">Apply now and hear back within 3–5 business days.</p>
      </div>
      

      <form id="partnerForm" class="mt-10 max-w-3xl mx-auto grid gap-8" action="{{url('become-a-partner-store')}}" method="post">
        @csrf
        
        <!-- Stepper -->
        <!-- <div class="relative flex items-center justify-between gap-4 text-sm font-semibold">
          <div class="relative z-10 flex flex-col items-center">
            <div class="step bubble active">1</div>
            <span class="mt-2">Company</span>
          </div>
          <div class="absolute top-4 left-0 right-0 h-1 bg-slate-200 dark:bg-slate-800 z-0">
            <div class="step-progress h-full bg-brand-600 transition-all duration-500 ease-in-out" style="width: 0%"></div>
          </div>
          <div class="relative z-10 flex flex-col items-center">
            <div class="step bubble">2</div>
            <span class="mt-2">Business</span>
          </div>
          <div class="absolute top-4 left-50% right-0 h-1 bg-slate-200 dark:bg-slate-800 z-0">
            <div class="step-progress h-full bg-brand-600 transition-all duration-500 ease-in-out" style="width: 0%"></div>
          </div>
          <div class="relative z-10 flex flex-col items-center">
            <div class="step bubble">3</div>
            <span class="mt-2">Legal</span>
          </div>
        </div> -->

        <!-- STEP 1 -->
      
        <fieldset data-step="1" class="step-panel rounded-2xl border border-slate-200 dark:border-slate-800 p-8 bg-white dark:bg-slate-900 shadow-soft animate-scale-in">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('success'))
            <div id="flash-card" 
                class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-3 transition-all transform scale-0">
                <span class="font-semibold">{{ Session::get('success') }}</span>
                <button type="button" id="close-flash" class="ml-4 text-white hover:text-gray-200">
                    &times;
                </button>
            </div>
        @endif
            <legend class="sr-only">School Details</legend>
          
          <!-- Logo Field First -->
          <div class="mb-6">
            <label for="schoolLogo" class="block text-sm font-medium text-slate-700 dark:text-slate-200">School Logo</label>
            <input id="schoolLogo" name="school_logo" type="file" accept=".png,.jpg,.jpeg" 
              class="mt-2 block w-full text-sm file:mr-4 file:rounded-full file:border-0 
                    file:bg-brand-600 file:px-5 file:py-2.5 file:text-white file:font-semibold 
                    file:hover:bg-brand-700 file:transition-all"  />
            <!-- Preview -->
            <img id="logoPreview" src="" alt="Logo Preview" class="mt-3 w-32 h-32 object-cover rounded border hidden" />
          </div>

          <div class="grid sm:grid-cols-2 gap-6">
            <div>
              <label for="schoolName" class="block text-sm font-medium text-slate-700 dark:text-slate-200">School Name</label>
              <input id="schoolName" name="school_name" type="text" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="Eg. Sunrise Public School"  />
            </div>
            <div>
              <label for="schoolEmail" class="block text-sm font-medium text-slate-700 dark:text-slate-200">School Email</label>
              <input id="schoolEmail" name="school_email" type="email" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="school@example.com"  />
            </div>
            <div class="sm:col-span-2">
              <label for="schoolPhone" class="block text-sm font-medium text-slate-700 dark:text-slate-200">School Phone 1</label>
              <input id="schoolPhone" name="school_phone_1" type="tel" pattern="^\+?[0-9\s-]{7,}$" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="+91 98765 43210"  />
            </div>
            <div class="sm:col-span-2">
              <label for="address" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Address</label>
              <input id="address" name="address" type="text" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="123 Main Street"  />
            </div>
            <div>
              <label for="city" class="block text-sm font-medium text-slate-700 dark:text-slate-200">City</label>
              <input id="city" name="city" type="text" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="Eg. Lucknow"  />
            </div>
            <div>
              <label for="state" class="block text-sm font-medium text-slate-700 dark:text-slate-200">State</label>
              <input id="state" name="state" type="text" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="Eg. Uttar Pradesh"  />
            </div>
            <div>
              <label for="zip" class="block text-sm font-medium text-slate-700 dark:text-slate-200">ZIP Code</label>
              <input id="zip" name="zip" type="text" 
                class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 
                      bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 
                      focus:border-brand-500 transition-all" 
                placeholder="Eg. 226001"  />
            </div>
          </div>

          <div class="mt-8 flex justify-end gap-4">
            <button type="submit" class="inline-flex items-center rounded-full bg-brand-600 px-6 py-3 text-white font-semibold shadow-soft hover:bg-brand-700 transition-all hover:scale-105" data-next>Submit</button>
          </div>
        </fieldset>
         </form>

        <!-- STEP 2 -->
        <fieldset data-step="2" class="step-panel hidden rounded-2xl border border-slate-200 dark:border-slate-800 p-8 bg-white dark:bg-slate-900 shadow-soft animate-scale-in">
          <legend class="sr-only">Business</legend>
          <div class="grid gap-6 sm:grid-cols-2">
            <div>
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Primary Segments</label>
              <div class="mt-3 grid grid-cols-2 gap-4 text-sm">
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="segment" value="K-12" class="accent-brand-600 h-5 w-5 rounded">K‑12</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="segment" value="Coaching" class="accent-brand-600 h-5 w-5 rounded">Coaching</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="segment" value="HigherEd" class="accent-brand-600 h-5 w-5 rounded">Higher‑Ed</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="segment" value="EdTech" class="accent-brand-600 h-5 w-5 rounded">EdTech</label>
              </div>
            </div>
            <div>
              <label for="regions" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Sales Regions</label>
              <input id="regions" name="regions" type="text" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" placeholder="Eg. India (North), Middle East" required />
            </div>
            <div class="sm:col-span-2">
              <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">CRM Modules You Will Sell</label>
              <div class="mt-3 grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Admissions" class="accent-brand-600 h-5 w-5 rounded">Admissions</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Fees" class="accent-brand-600 h-5 w-5 rounded">Fees</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Attendance" class="accent-brand-600 h-5 w-5 rounded">Attendance</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Communication" class="accent-brand-600 h-5 w-5 rounded">Communication</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Analytics" class="accent-brand-600 h-5 w-5 rounded">Analytics</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="LMS" class="accent-brand-600 h-5 w-5 rounded">LMS</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Transport" class="accent-brand-600 h-5 w-5 rounded">Transport</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="Library" class="accent-brand-600 h-5 w-5 rounded">Library</label>
                <label class="inline-flex items-center gap-3"><input type="checkbox" name="modules" value="HR/Payroll" class="accent-brand-600 h-5 w-5 rounded">HR/Payroll</label>
              </div>
              <p id="modulesHelp" class="mt-3 text-xs text-slate-500">Select at least one module.</p>
            </div>
            <div>
              <label for="leadVolume" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Estimated Monthly Leads: <span id="leadValue" class="font-semibold">25</span></label>
              <input id="leadVolume" name="leadVolume" type="range" min="0" max="200" step="5" value="25" class="mt-3 w-full h-2 bg-slate-200 dark:bg-slate-800 rounded-full accent-brand-600 cursor-pointer" />
            </div>
            <div>
              <label for="currentClients" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Current Education Clients</label>
              <input id="currentClients" name="currentClients" type="number" min="0" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" placeholder="Eg. 12" required />
            </div>
            <div class="sm:col-span-2">
              <label for="notes" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Notes (optional)</label>
              <textarea id="notes" name="notes" rows="3" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" placeholder="Anything else we should know?"></textarea>
            </div>
            <div class="sm:col-span-2">
              <label for="doc" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Upload Company Profile / Deck (optional)</label>
              <input id="doc" name="doc" type="file" accept=".pdf,.png,.jpg,.jpeg" class="mt-2 block w-full text-sm file:mr-4 file:rounded-full file:border-0 file:bg-brand-600 file:px-5 file:py-2.5 file:text-white file:font-semibold file:hover:bg-brand-700 file:transition-all" />
            </div>
          </div>
          <div class="mt-8 flex justify-between gap-4">
            <button type="button" class="inline-flex items-center rounded-full border border-slate-300 dark:border-slate-700 px-6 py-3 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all hover:scale-105" data-prev>Back</button>
            <button type="button" class="inline-flex items-center rounded-full bg-brand-600 px-6 py-3 text-white font-semibold shadow-soft hover:bg-brand-700 transition-all hover:scale-105" data-next>Next</button>
          </div>
        </fieldset>

        <!-- STEP 3 -->
        <fieldset data-step="3" class="step-panel hidden rounded-2xl border border-slate-200 dark:border-slate-800 p-8 bg-white dark:bg-slate-900 shadow-soft animate-scale-in">
          <legend class="sr-only">Legal</legend>
          <div class="grid gap-6 sm:grid-cols-2">
            <div>
              <label for="payoutMethod" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Payout Method</label>
              <select id="payoutMethod" name="payoutMethod" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" required>
                <option value="">Select…</option>
                <option>Bank Transfer</option>
                <option>UPI</option>
                <option>PayPal</option>
              </select>
            </div>
            <div>
              <label for="currency" class="block text-sm font-medium text-slate-700 dark:text-slate-200">Preferred Currency</label>
              <select id="currency" name="currency" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" required>
                <option value="">Select…</option>
                <option>INR</option>
                <option>USD</option>
                <option>EUR</option>
              </select>
            </div>
            <div>
              <label for="gst" class="block text-sm font-medium text-slate-700 dark:text-slate-200">GST/VAT (if applicable)</label>
              <input id="gst" name="gst" type="text" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" placeholder="Eg. 27ABCDE1234F1Z5" />
            </div>
            <div>
              <label for="pan" class="block text-sm font-medium text-slate-700 dark:text-slate-200">PAN/Tax ID (if applicable)</label>
              <input id="pan" name="pan" type="text" class="mt-2 w-full rounded-xl border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-950 py-3 text-sm focus:ring-brand-500 focus:border-brand-500 transition-all" placeholder="ABCDE1234F" />
            </div>
            <div class="sm:col-span-2">
              <label class="inline-flex items-start gap-3 text-sm"><input id="consent" type="checkbox" class="mt-1 accent-brand-600 h-5 w-5 rounded" required> I agree to the <a href="#" class="text-brand-600 hover:underline">Partner Terms</a> and <a href="#" class="text-brand-600 hover:underline">Privacy Policy</a>.</label>
            </div>
            <div class="sm:col-span-2">
              <label class="inline-flex items-start gap-3 text-sm"><input id="marketing" type="checkbox" class="mt-1 accent-brand-600 h-5 w-5 rounded"> I’d like to receive product updates and partner newsletters.</label>
            </div>
            <div class="sm:col-span-2">
              <div class="rounded-xl border border-dashed border-slate-300 dark:border-slate-700 p-4 text-center text-sm text-slate-500">reCAPTCHA Placeholder</div>
            </div>
          </div>
          <div class="mt-8 flex justify-between gap-4">
            <button type="button" class="inline-flex items-center rounded-full border border-slate-300 dark:border-slate-700 px-6 py-3 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all hover:scale-105" data-prev>Back</button>
            <button type="submit" class="inline-flex items-center rounded-full bg-brand-600 px-6 py-3 text-white font-semibold shadow-soft hover:bg-brand-700 transition-all hover:scale-105">Submit Application</button>
          </div>
          <p class="mt-4 text-xs text-slate-500">We use your info to evaluate partner fit and contact you. Opt out anytime.</p>
        </fieldset>
    

      <!-- Success Toast -->
      <div id="toast" class="fixed bottom-6 right-6 hidden rounded-xl bg-accent-600 text-white px-5 py-3 shadow-glow animate-scale-in">
        <span class="font-semibold">Application Submitted!</span>
        <span class="ml-2 opacity-90" id="refId"></span>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
      <h2 class="text-3xl sm:text-4xl font-bold text-center tracking-tight">Frequently Asked Questions</h2>
      <div class="mt-8 grid md:grid-cols-2 gap-6">
        <details class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all group">
          <summary class="cursor-pointer text-lg font-semibold">Who can become a partner?</summary>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Agencies, consultancies, EdTech firms, or experts in education markets.</p>
        </details>
        <details class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all group">
          <summary class="cursor-pointer text-lg font-semibold">How are commissions calculated?</summary>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Based on first-year ACV and renewals, with varying rates for add-ons.</p>
        </details>
        <details class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all group">
          <summary class="cursor-pointer text-lg font-semibold">Do you offer enablement?</summary>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Yes, including demo environments and live workshops.</p>
        </details>
        <details class="card rounded-2xl border border-slate-200 dark:border-slate-800 p-6 bg-white dark:bg-slate-900 shadow-soft hover:shadow-glow transition-all group">
          <summary class="cursor-pointer text-lg font-semibold">Is territory protection available?</summary>
          <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Yes, for active partners with deal registration.</p>
        </details>
      </div>
    </section>

    <!-- FOOTER -->
    <!-- <footer class="border-t border-slate-200/50 dark:border-slate-800/50">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 text-sm">
        <div>
          <div class="flex items-center gap-3 font-extrabold text-lg tracking-tight">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-brand-600 text-white shadow-soft">SC</span>
            <span>School CRM</span>
          </div>
          <p class="mt-3 text-slate-600 dark:text-slate-300">The modern platform for admissions, fees, and analytics.</p>
        </div>
        <div class="grid grid-cols-2 gap-6">
          <div>
            <h4 class="font-semibold">Program</h4>
            <ul class="mt-2 space-y-2">
              <li><a href="#benefits" class="hover:text-brand-500 transition-colors">Benefits</a></li>
              <li><a href="#tiers" class="hover:text-brand-500 transition-colors">Tiers</a></li>
              <li><a href="#apply" class="hover:text-brand-500 transition-colors">Apply</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-semibold">Contact</h4>
            <ul class="mt-2 space-y-2">
              <li><a href="mailto:partners@schoolcrm.example" class="hover:text-brand-500 transition-colors">partners@schoolcrm.example</a></li>
              <li><a href="#" class="hover:text-brand-500 transition-colors">Partner Terms</a></li>
              <li><a href="#" class="hover:text-brand-500 transition-colors">Privacy</a></li>
            </ul>
          </div>
        </div>
        <div class="lg:text-right text-slate-500">© <span id="year"></span> School CRM. All rights reserved.</div>
      </div>
    </footer> -->

    <!-- UTIL STYLES -->
    <style>
      .btn-secondary {
        @apply inline-flex items-center rounded-full border border-slate-300 dark:border-slate-700 px-5 py-2.5 font-semibold hover:bg-slate-50 dark:hover:bg-slate-900/50 transition-all hover:scale-105;
      }
      .bubble {
        @apply inline-flex h-10 w-10 items-center justify-center rounded-full border-2 border-slate-300 dark:border-slate-700 font-semibold text-lg bg-white dark:bg-slate-950;
      }
      .active.bubble {
        @apply bg-brand-600 text-white border-brand-600 shadow-glow;
      }
      .step-panel[hidden] {
        display: none;
      }
      .field-error {
        @apply border-red-500 focus:ring-red-500;
      }
      .error-text {
        @apply mt-2 text-xs text-red-600;
      }
    </style>

    <!-- INTERACTIVITY -->
    <script>
      // Navbar toggles
      document.getElementById('menuBtn').addEventListener('click', () => {
        document.getElementById('mobileNav').classList.toggle('hidden');
      });
      document.getElementById('themeToggle').addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
      });
      document.getElementById('year').textContent = new Date().getFullYear();

      // Stepper logic
      const form = document.getElementById('partnerForm');
      const panels = [...form.querySelectorAll('.step-panel')];
      const bubbles = [...document.querySelectorAll('.bubble')];
      const progressBars = [...document.querySelectorAll('.step-progress')];
      let step = 0;
      function showStep(i) {
        panels.forEach((p, idx) => p.classList.toggle('hidden', idx !== i));
        bubbles.forEach((b, idx) => b.classList.toggle('active', idx <= i));
        progressBars.forEach((bar, idx) => {
          bar.style.width = i > idx ? '100%' : i === idx ? '50%' : '0%';
        });
        step = i;
        saveDraft();
      }
      form.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
        if (validateStep(step)) showStep(Math.min(step + 1, panels.length - 1));
      }));
      form.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => showStep(Math.max(step - 1, 0))));

      // Live range value
      const leadRange = document.getElementById('leadVolume');
      const leadValue = document.getElementById('leadValue');
      leadRange.addEventListener('input', () => leadValue.textContent = leadRange.value);

      // Validation helpers
      function setError(el, msg) {
        el.classList.add('field-error');
        let hint = el.parentElement.querySelector('.error-text');
        if (!hint) {
          hint = document.createElement('p');
          hint.className = 'error-text';
          el.parentElement.appendChild(hint);
        }
        hint.textContent = msg;
      }
      function clearError(el) {
        el.classList.remove('field-error');
        const hint = el.parentElement.querySelector('.error-text');
        if (hint) hint.remove();
      }
      function validateStep(i) {
        let ok = true;
        panels[i].querySelectorAll('.error-text').forEach(n => n.remove());
        panels[i].querySelectorAll('.field-error').forEach(n => n.classList.remove('field-error'));

        const required = panels[i].querySelectorAll('[required]');
        required.forEach(el => {
          if ((el.type === 'checkbox' && !el.checked) || (el.type !== 'checkbox' && !el.value)) {
            ok = false;
            setError(el, 'This field is required');
          }
        });
        if (i === 0) {
          const email = document.getElementById('email');
          if (email.value && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) {
            ok = false;
            setError(email, 'Enter a valid email');
          }
          const phone = document.getElementById('phone');
          if (phone.value && !/^\+?[0-9\s-]{7,}$/.test(phone.value)) {
            ok = false;
            setError(phone, 'Enter a valid phone');
          }
        }
        if (i === 1) {
          const modules = panels[i].querySelectorAll('input[name="modules"]:checked');
          if (modules.length === 0) {
            const help = document.getElementById('modulesHelp');
            help.textContent = 'Select at least one module.';
            help.classList.add('text-red-600');
            ok = false;
          } else {
            const help = document.getElementById('modulesHelp');
            help.textContent = 'Great choice!';
            help.classList.remove('text-red-600');
          }
        }
        return ok;
      }

      // Draft save to localStorage
      const DRAFT_KEY = 'partnerDraftV1';
      function saveDraft() {
        const data = new FormData(form);
        const json = {};
        for (const [k, v] of data.entries()) {
          if (json[k]) {
            json[k] = Array.isArray(json[k]) ? [...json[k], v] : [json[k], v];
          } else {
            json[k] = v;
          }
        }
        json._step = step;
        localStorage.setItem(DRAFT_KEY, JSON.stringify(json));
      }
      function loadDraft() {
        const raw = localStorage.getItem(DRAFT_KEY);
        if (!raw) return;
        const data = JSON.parse(raw);
        for (const [k, v] of Object.entries(data)) {
          if (k.startsWith('_')) continue;
          const el = form.elements[k];
          if (!el) continue;
          if (el instanceof RadioNodeList || (el.length && el[0] && el[0].type === 'checkbox')) {
            const values = Array.isArray(v) ? v : [v];
            [...form.querySelectorAll(`[name="${k}"]`)].forEach(ch => ch.checked = values.includes(ch.value));
          } else {
            el.value = v;
          }
        }
        leadValue.textContent = document.getElementById('leadVolume').value;
        showStep(data._step || 0);
      }
      loadDraft();
      form.addEventListener('input', saveDraft);

      // Submit (demo)
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!validateStep(2)) return;
        const data = Object.fromEntries(new FormData(form).entries());
        const ref = 'PART-' + Math.random().toString(36).slice(2, 8).toUpperCase();
        document.getElementById('refId').textContent = `Reference: ${ref}`;
        const toast = document.getElementById('toast');
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 5000);
        localStorage.removeItem(DRAFT_KEY);
        form.reset();
        showStep(0);
        window.scrollTo({ top: document.getElementById('apply').offsetTop - 80, behavior: 'smooth' });
      });
    </script>
    <!-- Add this JS below your form -->
    <script>
      document.getElementById('schoolLogo').addEventListener('change', function(event) {
        const preview = document.getElementById('logoPreview');
        const file = event.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
          }
          reader.readAsDataURL(file);
        } else {
          preview.src = '';
          preview.classList.add('hidden');
        }
      });
    </script>
   <script>
    document.addEventListener('DOMContentLoaded', () => {
        const flashCard = document.getElementById('flash-card');
        const closeBtn = document.getElementById('close-flash');

        if (flashCard) {
            // Show flash card with scale animation
            flashCard.classList.remove('scale-0');
            flashCard.classList.add('scale-100');

            // Auto-hide after 3 seconds
            setTimeout(() => {
                flashCard.classList.add('scale-0');
                flashCard.classList.remove('scale-100');
            }, 3000);
        }

        // Close button functionality
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                flashCard.classList.add('scale-0');
                flashCard.classList.remove('scale-100');
            });
        }
    });
</script>

  </div>

@stop