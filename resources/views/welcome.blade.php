<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

         <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#2170e4",
                        "surface-container-highest": "#e1e3e4",
                        "on-secondary-fixed-variant": "#004395",
                        "on-secondary": "#ffffff",
                        "surface": "#f8f9fa",
                        "primary-fixed-dim": "#c3c0ff",
                        "tertiary-container": "#a44100",
                        "outline": "#777587",
                        "tertiary-fixed": "#ffdbcc",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "inverse-surface": "#2e3132",
                        "inverse-primary": "#c3c0ff",
                        "secondary-fixed-dim": "#adc6ff",
                        "on-surface-variant": "#464555",
                        "surface-container-low": "#f3f4f5",
                        "secondary-fixed": "#d8e2ff",
                        "on-primary-container": "#dbd7ff",
                        "surface-variant": "#e1e3e4",
                        "outline-variant": "#c7c4d8",
                        "inverse-on-surface": "#f0f1f2",
                        "on-surface": "#191c1d",
                        "surface-tint": "#5148d7",
                        "on-tertiary-container": "#ffd2be",
                        "on-primary-fixed": "#100069",
                        "primary": "#392cc1",
                        "secondary": "#0058be",
                        "surface-bright": "#f8f9fa",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#e3dfff",
                        "on-primary-fixed-variant": "#372abf",
                        "on-primary": "#ffffff",
                        "on-secondary-container": "#fefcff",
                        "on-tertiary-fixed": "#351000",
                        "tertiary": "#7e3000",
                        "surface-dim": "#d9dadb",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "error": "#ba1a1a",
                        "on-secondary-fixed": "#001a42",
                        "background": "#f8f9fa",
                        "surface-container-high": "#e7e8e9",
                        "on-background": "#191c1d",
                        "tertiary-fixed-dim": "#ffb695",
                        "surface-container": "#edeeef",
                        "on-error-container": "#93000a",
                        "primary-container": "#534ad9"
                    },
                    fontFamily: {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface antialiased flex">
    <!-- SIDE BAR (Shared Component: SideNavBar) -->
    <aside
        class="fixed left-0 top-0 h-full z-40 flex flex-col h-screen w-64 border-r border-transparent bg-slate-50 dark:bg-slate-900 font-manrope antialiased tracking-tight">
        <div class="px-6 py-8 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-primary-container flex items-center justify-center text-on-primary">
                <span class="material-symbols-outlined text-lg" data-icon="school">school</span>
            </div>
            <div>
                <h2 class="text-xl font-bold tracking-tighter text-indigo-700 dark:text-indigo-300">The Professor</h2>
                <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Admin System</p>
            </div>
        </div>
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <!-- Active Tab: New Chat -->
            <button
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-150 active:scale-95 bg-white dark:bg-indigo-950/30 text-indigo-600 dark:text-indigo-300 shadow-sm font-medium">
                <span class="material-symbols-outlined" data-icon="add_comment">add_comment</span>
                <span>New Chat</span>
            </button>
            <!-- Inactive Tab: Reports -->
            <button
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-colors text-slate-500 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 dark:hover:bg-slate-800 font-medium">
                <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                <span>Reports</span>
            </button>
        </nav>
        <div class="p-4 mt-auto border-t border-slate-100 dark:border-slate-800">
            <button
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:text-indigo-500 hover:bg-slate-200/50 transition-colors">
                <span class="material-symbols-outlined" data-icon="settings">settings</span>
                <span>Settings</span>
            </button>
            <div class="flex items-center gap-3 px-4 py-3 mt-2 rounded-xl">
                <div class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden">
                    <img alt="Admin Avatar" class="w-full h-full object-cover"
                        data-alt="Minimalist circular portrait of a professional male administrator"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAVZ05D6bu8xDzQ-HmHR1niSNNpG0vNf8AW0bNj7euTbFu-Ua55FIkSlVMRmK1EkpGsJCEh9f-Hp0Sgt1PtC3gtyz5qE5Sui91kWEyzVsdCB3j6o2oqqn9QdNDms8NncNjUCLaKNuvjwgPUvE4BfTorYtGCLS-f-BU3iWp4NRKdqLBHaxTxtK3ztb45TTSB5vQ2sjMMXaxhnb9FCiS_H8074RQd5hNTABNFGwsug7YUvrsf3gI0bLpS_YuwlawRFSyuP7U1mbgCU0o" />
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold truncate">Account</p>
                    <p class="text-xs text-slate-400 truncate">admin@professor.ai</p>
                </div>
                <span class="material-symbols-outlined text-slate-300 text-sm"
                    data-icon="account_circle">account_circle</span>
            </div>
        </div>
    </aside>
    <!-- MAIN CONTENT AREA -->
    <main class="ml-64 flex-1 flex flex-col min-h-screen bg-surface">
        <!-- Top Nav (Shared Component: TopAppBar) -->
        <header
            class="sticky top-0 right-0 w-full z-30 flex justify-between items-center px-8 py-4 bg-white/80 dark:bg-slate-950/80 backdrop-blur-xl border-b border-slate-100 dark:border-slate-800 shadow-sm shadow-indigo-500/5">
            <div class="flex items-center gap-8">
                <h1 class="text-lg font-extrabold text-on-surface tracking-tight">The Professor</h1>
                <nav class="hidden md:flex gap-6 font-manrope font-medium text-sm">
                    <a class="text-slate-500 hover:text-indigo-600 transition-all" href="#">Dashboard</a>
                    <a class="text-indigo-600 border-b-2 border-indigo-600 pb-1" href="#">Analytics</a>
                    <a class="text-slate-500 hover:text-indigo-600 transition-all" href="#">Team</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative hidden lg:block">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg"
                        data-icon="search">search</span>
                    <input
                        class="pl-10 pr-4 py-1.5 bg-surface-container-low border-none rounded-full text-sm w-64 focus:ring-2 focus:ring-primary/20 placeholder:text-outline-variant"
                        placeholder="Search data..." type="text" />
                </div>
                <button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                </button>
                <button class="p-2 text-slate-500 hover:bg-slate-100 rounded-full transition-colors">
                    <span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
                </button>
            </div>
        </header>
        <!-- DASHBOARD CANVAS -->
        <div class="p-8 flex flex-col gap-8 max-w-7xl mx-auto w-full">
            <!-- CHAT SECTION -->
            <section class="bg-surface-container-low rounded-3xl p-1 overflow-hidden shadow-sm flex flex-col h-[500px]">
                <!-- Chat Window Header -->
                <div
                    class="px-6 py-4 flex items-center justify-between bg-surface-container-lowest/50 backdrop-blur-md">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.4)]"></div>
                        <span class="text-sm font-semibold text-on-surface-variant">System Intelligence Active</span>
                    </div>
                    <span class="text-xs font-medium text-outline">v2.4.0-Indigo</span>
                </div>
                <!-- Chat History Area -->
                <div class="flex-1 overflow-y-auto p-8 space-y-6 scroll-smooth">
                    <!-- AI Bubble -->
                    <div class="flex items-start gap-4 max-w-[80%]">
                        <div
                            class="w-10 h-10 rounded-xl bg-primary-container flex-shrink-0 flex items-center justify-center text-on-primary shadow-lg shadow-indigo-500/20">
                            <span class="material-symbols-outlined text-lg" data-icon="smart_toy">smart_toy</span>
                        </div>
                        <div class="bg-surface-container-lowest p-5 rounded-2xl rounded-tl-none shadow-sm">
                            <p class="text-on-surface leading-relaxed body-md">Hi! How can I help? Type 'start' or a
                                number to request a report.</p>
                            <!-- Selectable Options -->
                            <div class="mt-6 flex flex-wrap gap-3">
                                <button
                                    class="px-5 py-2.5 bg-secondary-fixed text-on-secondary-fixed hover:bg-primary-fixed transition-all rounded-full text-sm font-medium flex items-center gap-2 border border-outline-variant/10">
                                    <span
                                        class="w-5 h-5 flex items-center justify-center rounded-full bg-white/50 text-[10px] font-bold">1</span>
                                    Monthly Report
                                </button>
                                <button
                                    class="px-5 py-2.5 bg-surface-container-high text-on-surface-variant hover:bg-primary-fixed transition-all rounded-full text-sm font-medium flex items-center gap-2 border border-outline-variant/10">
                                    <span
                                        class="w-5 h-5 flex items-center justify-center rounded-full bg-surface-container-lowest text-[10px] font-bold">2</span>
                                    Weekly Report
                                </button>
                                <button
                                    class="px-5 py-2.5 bg-surface-container-high text-on-surface-variant hover:bg-primary-fixed transition-all rounded-full text-sm font-medium flex items-center gap-2 border border-outline-variant/10">
                                    <span
                                        class="w-5 h-5 flex items-center justify-center rounded-full bg-surface-container-lowest text-[10px] font-bold">3</span>
                                    Daily Report
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- User Bubble (Simulated response) -->
                    <div class="flex items-start justify-end gap-4">
                        <div
                            class="max-w-[70%] bg-primary-container text-on-primary-container p-4 rounded-2xl rounded-tr-none shadow-xl shadow-indigo-500/10">
                            <p class="body-md">Show me the 1 → Monthly Report data for the current period.</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-xl bg-secondary-container flex-shrink-0 flex items-center justify-center text-on-secondary shadow-lg shadow-blue-500/20">
                            <span class="material-symbols-outlined text-lg" data-icon="person">person</span>
                        </div>
                    </div>
                </div>
                <!-- Input Area -->
                <div class="p-6 bg-surface-container-low">
                    <div class="relative max-w-4xl mx-auto">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline-variant"
                                data-icon="terminal">terminal</span>
                        </div>
                        <input
                            class="w-full pl-12 pr-16 py-4 bg-surface-container-lowest border-none rounded-2xl shadow-xl shadow-indigo-500/5 focus:ring-2 focus:ring-primary/20 placeholder:text-outline-variant font-body"
                            placeholder="Type a number to request report..." type="text" />
                        <button
                            class="absolute right-2 top-1/2 -translate-y-1/2 p-2.5 bg-gradient-to-br from-primary to-primary-container text-on-primary rounded-xl shadow-lg hover:scale-105 transition-transform flex items-center justify-center">
                            <span class="material-symbols-outlined" data-icon="send">send</span>
                        </button>
                    </div>
                </div>
            </section>
            <!-- REPORT PREVIEW SECTION -->
            <section class="flex flex-col gap-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold tracking-tight text-on-surface headline-sm">Report Preview</h2>
                        <p class="text-sm text-on-surface-variant">Displaying 15 entries for October Monthly Analytics
                        </p>
                    </div>
                    <button
                        class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-xl font-semibold shadow-xl shadow-indigo-500/20 hover:shadow-indigo-500/30 transition-all active:scale-95">
                        <span class="material-symbols-outlined" data-icon="download">download</span>
                        Download Report
                    </button>
                </div>
                <!-- Glassmorphism Data Table -->
                <div
                    class="bg-surface-container-lowest rounded-3xl overflow-hidden shadow-sm border border-outline-variant/10">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low/50">
                                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-outline">Name
                                    </th>
                                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-outline">
                                        Surname</th>
                                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-outline">
                                        Amount</th>
                                    <th class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-outline">
                                        Status</th>
                                    <th
                                        class="px-8 py-5 text-xs font-bold uppercase tracking-wider text-outline text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <!-- Row 1 -->
                                <tr class="hover:bg-surface-container-low transition-colors group">
                                    <td class="px-8 py-5 font-semibold text-on-surface">Alexander</td>
                                    <td class="px-8 py-5 text-on-surface-variant">Hamilton</td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-sm font-bold">$4,250.00</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span class="text-sm font-medium text-on-surface">Processed</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="p-2 text-outline-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined"
                                                data-icon="more_vert">more_vert</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="hover:bg-surface-container-low transition-colors group">
                                    <td class="px-8 py-5 font-semibold text-on-surface">Beatrix</td>
                                    <td class="px-8 py-5 text-on-surface-variant">Kiddo</td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-sm font-bold">$12,400.00</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span class="text-sm font-medium text-on-surface">Processed</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="p-2 text-outline-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined"
                                                data-icon="more_vert">more_vert</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="hover:bg-surface-container-low transition-colors group">
                                    <td class="px-8 py-5 font-semibold text-on-surface">Caspar</td>
                                    <td class="px-8 py-5 text-on-surface-variant">Vane</td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-sm font-bold">$8,920.50</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                            <span class="text-sm font-medium text-on-surface">Pending</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="p-2 text-outline-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined"
                                                data-icon="more_vert">more_vert</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 4 -->
                                <tr class="hover:bg-surface-container-low transition-colors group">
                                    <td class="px-8 py-5 font-semibold text-on-surface">Dominic</td>
                                    <td class="px-8 py-5 text-on-surface-variant">Toretto</td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-sm font-bold">$3,100.00</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span class="text-sm font-medium text-on-surface">Processed</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="p-2 text-outline-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined"
                                                data-icon="more_vert">more_vert</span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Row 5 -->
                                <tr class="hover:bg-surface-container-low transition-colors group">
                                    <td class="px-8 py-5 font-semibold text-on-surface">Elena</td>
                                    <td class="px-8 py-5 text-on-surface-variant">Fisher</td>
                                    <td class="px-8 py-5">
                                        <span
                                            class="px-3 py-1 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-sm font-bold">$6,700.00</span>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span class="text-sm font-medium text-on-surface">Processed</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <button class="p-2 text-outline-variant hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined"
                                                data-icon="more_vert">more_vert</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Footer / Pagination -->
                    <div
                        class="px-8 py-4 bg-surface-container-low/30 flex items-center justify-between border-t border-slate-100">
                        <span class="text-xs font-medium text-on-surface-variant">Showing 1 to 5 of 15 entries</span>
                        <div class="flex gap-2">
                            <button
                                class="p-2 rounded-lg hover:bg-surface-container-high text-on-surface-variant transition-colors">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="chevron_left">chevron_left</span>
                            </button>
                            <button
                                class="px-3 py-1 rounded-lg bg-primary text-on-primary text-xs font-bold">1</button>
                            <button
                                class="px-3 py-1 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-xs font-bold">2</button>
                            <button
                                class="px-3 py-1 rounded-lg hover:bg-surface-container-high text-on-surface-variant text-xs font-bold">3</button>
                            <button
                                class="p-2 rounded-lg hover:bg-surface-container-high text-on-surface-variant transition-colors">
                                <span class="material-symbols-outlined text-sm"
                                    data-icon="chevron_right">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Footer Spacer -->
        <footer class="mt-auto py-10 text-center">
            <p class="text-[10px] uppercase tracking-widest text-outline font-bold opacity-50">Secure Admin Environment
                | © 2024 The Professor AI</p>
        </footer>
    </main>
</body>
</html>
