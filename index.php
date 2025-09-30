<?php
// Username GitHub Anda
$githubUsername = 'dvndnazhrrr20';
// MENGAMBIL PROYEK YANG DIBINTANGI (STARRED)
$apiUrl = "https://api.github.com/users/{$githubUsername}/starred";

// GitHub API memerlukan User-Agent header
$options = [
    'http' => [
        'header' => 'User-Agent: ' . $githubUsername . "\r\n"
    ]
];
$context = stream_context_create($options);

// Mengambil data dari API
$response = @file_get_contents($apiUrl, false, $context);
$projects = [];

if ($response) {
    // Ubah JSON menjadi array PHP
    $allProjects = json_decode($response, true);
    
    // Ambil 4 proyek teratas yang Anda bintangi (INI PERUBAHANNYA)
    if (is_array($allProjects)) {
        $projects = array_slice($allProjects, 0, 4);
    }
}

// Baca file data JSON lokal untuk deskripsi detail
$metaDataFile = 'projects_data.json';
$projectsMetaData = [];
if (file_exists($metaDataFile)) {
    $projectsMetaData = json_decode(file_get_contents($metaDataFile), true);
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diviandini Azzahra - Web Developer</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #0D1117;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-text {
            background: linear-gradient(90deg, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
        }
        .skill-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
            color: #cbd5e1; /* slate-300 */
        }
        .skill-item:hover {
            transform: scale(1.1);
            color: white;
        }
        .skill-item i {
            font-size: 3rem;
        }
        @media (min-width: 768px) {
            .skill-item i {
                font-size: 4rem; 
            }
        }
    </style>
</head>
<body class="text-slate-300">

    <div class="fixed top-0 left-0 w-full h-full -z-10 overflow-hidden">
        <div class="absolute top-[-20%] right-[-20%] w-[40%] h-[80%] bg-indigo-600/20 rounded-full blur-3xl opacity-70"></div>
        <div class="absolute bottom-[-20%] left-[-20%] w-[40%] h-[80%] bg-sky-800/20 rounded-full blur-3xl opacity-60"></div>
    </div>

    <header class="sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-5 flex justify-between items-center glass-card border-x-0 border-t-0 rounded-b-2xl">
            <a href="#" class="text-2xl font-bold text-white">Portofolio</a>
            <ul class="hidden md:flex items-center space-x-8 text-sm">
                <li><a href="#home" class="hover:text-white transition-colors duration-300">Home</a></li>
                <li><a href="#about" class="hover:text-white transition-colors duration-300">About</a></li>
                <li><a href="#projects" class="hover:text-white transition-colors duration-300">Project</a></li>
                <li><a href="#connect" class="hover:text-white transition-colors duration-300">Contact</a></li>
            </ul>
            <button id="mobile-menu-button" class="md:hidden text-2xl text-white">☰</button>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 glass-card border-x-0 border-t-0 rounded-b-2xl">
            <ul class="flex flex-col space-y-4 text-center mt-4">
                <li><a href="#home" class="block hover:text-white">Home</a></li>
                <li><a href="#about" class="block hover:text-white">About</a></li>
                <li><a href="#projects" class="block hover:text-white">Project</a></li>
                <li><a href="#connect" class="block hover:text-white">Contact</a></li>
            </ul>
        </div>
    </header>

    <main class="container mx-auto px-6">

        <section id="home" class="min-h-[90vh] flex flex-col-reverse lg:flex-row items-center justify-center gap-12 py-20">
            <div class="text-center lg:text-left lg:w-3/5">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white">Hi I'm <span class="gradient-text">Diviandini Azzahra</span></h1>
                <p class="mt-4 text-base md:text-lg max-w-2xl mx-auto lg:mx-0">
                    A passionate application and web developer dedicated to crafting modern, high-performance digital experiences through innovative and user-friendly solutions.
                </p>
                <div class="mt-8 flex justify-center lg:justify-start gap-4">
                    <a href="assets/CV_Diviandini-Azzahra.pdf" download class="border-2 border-slate-500 hover:bg-slate-700/50 text-white font-semibold py-3 px-6 rounded-full transition-all duration-300">Download CV</a>
                    <a href="#projects" class="border-2 border-slate-500 hover:bg-slate-700/50 text-white font-semibold py-3 px-6 rounded-full transition-all duration-300">Explore My Projects</a>
                </div>
            </div>
            <div class="lg:w-2/5 flex justify-center">
                <div class="w-full max-w-sm glass-card rounded-3xl p-6">
                    <div class="relative w-full h-80">
                       <img src="assets/images/andinn2.jpg" alt="Foto Profil Diviandini Azzahra" class="w-full h-full rounded-2xl object-cover">
                    </div>
                    <div class="text-center mt-4">
                        <h2 class="text-2xl font-bold text-white">Diviandini Azzahra</h2>
                        <p class="text-sm">Web Developer</p>
                    </div>
                    <div class="mt-6 flex justify-between items-center text-xs">
                        <div>
                            <p class="text-white">@dvndnazz</p>
                            <p class="text-red-400">Unemployed</p>
                        </div>
                        <a href="#connect" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-300">
                            Contact Me
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="about" class="py-20">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-2/3">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">About Me</h2>
                    <div class="space-y-4 text-slate-300">
                        <p>
                            Hi! I’m Diviandini Azzahra, a fresh graduate in Informatics from Universitas Islam Negri Sunan Gunung Djati Bandung. Throughout my academic journey, I developed a strong interest in Web Development, Machine Learning, and Project Management. I enjoy turning ideas into impactful digital solutions and continuously learning new technologies to sharpen my skills.
                        </p>
                        <p>
                            Beyond the world of technology, I am passionate about Photography, Social Media, and Content Creation, which allow me to express creativity and build meaningful engagement with people.
                        </p>
                        <p>
                            As a passionate application and web developer, I am dedicated to crafting modern, high-performance digital experiences through innovative and user-friendly solutions. With my combined interests in technology, creativity, and management, I aim to contribute to projects that not only solve problems but also inspire and create value.
                        </p>
                    </div>
                    <div class="mt-10">
                        <div class="flex flex-col sm:flex-row text-center sm:text-left gap-8">
                            <div>
                                <h3 class="text-4xl font-bold gradient-text">3.68<span class="text-2xl text-slate-400">/4.00</span></h3>
                                <p class="text-slate-400">GPA</p>
                            </div>
                        </div>
                        <p class="mt-6 text-slate-500 italic">Working with heart, creating with mind.</p>
                    </div>
                </div>
                <div class="lg:w-1/3 w-full flex justify-center mt-10 lg:mt-0">
                    <div class="relative">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-full h-20 w-8 bg-gray-800">
                            <div class="h-full w-1 bg-gray-600 mx-auto"></div>
                        </div>
                        <div class="glass-card rounded-2xl p-4 w-64 text-center">
                            <div class="w-48 h-48 mx-auto rounded-full overflow-hidden border-2 border-slate-500">
                                 <img src="assets/images/andin1.jpg" alt="Foto Profil Diviandini Azzahra" class="w-full h-full object-cover">
                            </div>
                            <div class="mt-4">
                                <span class="inline-block bg-indigo-500 text-white text-sm font-semibold px-4 py-1 rounded-full">
                                    Diviandini Azzahra
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills" class="py-20">
            <h3 class="text-3xl font-bold text-center text-white mb-12">My Professional Skills</h3>
            <div class="mb-12">
                <h4 class="text-xl font-semibold text-center text-slate-400 mb-8">Programming Languages</h4>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                    <div class="skill-item"><i class="devicon-c-plain colored"></i><p>C</p></div>
                    <div class="skill-item"><i class="devicon-cplusplus-plain colored"></i><p>C++</p></div>
                    <div class="skill-item"><i class="devicon-python-plain colored"></i><p>Python</p></div>
                    <div class="skill-item"><i class="devicon-java-plain colored"></i><p>Java</p></div>
                    <div class="skill-item"><i class="devicon-javascript-plain colored"></i><p>JavaScript</p></div>
                    <div class="skill-item"><i class="devicon-php-plain colored"></i><p>PHP</p></div>
                    <div class="skill-item"><i class="devicon-html5-plain colored"></i><p>HTML5</p></div>
                    <div class="skill-item"><i class="devicon-css3-plain colored"></i><p>CSS3</p></div>
                </div>
            </div>
            <div class="mb-12">
                <h4 class="text-xl font-semibold text-center text-slate-400 mb-8">Libraries & Frameworks</h4>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                    <div class="skill-item"><i class="devicon-react-original colored"></i><p>React.js</p></div>
                    <div class="skill-item"><i class="devicon-flask-original colored"></i><p>Flask</p></div>
                    <div class="skill-item"><i class="devicon-fastapi-plain colored"></i><p>FastAPI</p></div>
                    <div class="skill-item"><i class="devicon-laravel-plain colored"></i><p>Laravel</p></div>
                    <div class="skill-item"><i class="devicon-tailwindcss-plain colored"></i><p>Tailwind CSS</p></div>
                    <div class="skill-item"><i class="devicon-bootstrap-plain colored"></i><p>Bootstrap</p></div>
                    <div class="skill-item"><i class="devicon-tensorflow-original colored"></i><p>TensorFlow</p></div>
                </div>
            </div>
            <div class="mb-12">
                <h4 class="text-xl font-semibold text-center text-slate-400 mb-8">Tools & Platforms</h4>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                    <div class="skill-item"><i class="devicon-vscode-plain colored"></i><p>VS Code</p></div>
                    <div class="skill-item"><i class="devicon-google-plain colored"></i><p>Google Colab</p></div>
                    <div class="skill-item"><i class="devicon-jupyter-plain colored"></i><p>Jupyter</p></div>
                    <div class="skill-item"><i class="devicon-androidstudio-plain colored"></i><p>Android Studio</p></div>
                    <div class="skill-item"><i class="devicon-canva-original colored"></i><p>Canva</p></div>
                </div>
            </div>
            <div>
                <h4 class="text-xl font-semibold text-center text-slate-400 mb-8">Databases</h4>
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                    <div class="skill-item"><i class="devicon-firebase-plain colored"></i><p>Firebase</p></div>
                    <div class="skill-item"><i class="devicon-mysql-plain colored"></i><p>MySQL</p></div>
                    <div class="skill-item"><i class="devicon-postgresql-plain colored"></i><p>PostgreSQL</p></div>
                </div>
            </div>
        </section>

        <section id="projects" class="py-20">
    <div class="max-w-3xl mx-auto text-center mb-16">
        <h2 class="text-4xl font-bold text-white mb-4">Project</h2>
        <p class="text-slate-400">
            Showcasing a selection of projects that reflect my skills, creativity, and passion for building meaningful digital experiences.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
        
        <?php if (!empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                <?php
                    $repoName = $project['name'];
                    $imagePath = "assets/images/" . $repoName . ".png";
                    if (!file_exists($imagePath)) {
                        $imagePath = "assets/images/" . $repoName . ".jpg";
                        if (!file_exists($imagePath)) {
                            $imagePath = "https://placehold.co/600x400/0D1117/a78bfa?text=" . urlencode($repoName);
                        }
                    }
                    $detailedDescription = isset($projectsMetaData[$repoName]['detailed_description'])
                        ? htmlspecialchars($projectsMetaData[$repoName]['detailed_description'])
                        : htmlspecialchars($project['description'] ?: 'No detailed description available.');
                    $cardDescription = isset($projectsMetaData[$repoName]['card_description']) 
                        ? htmlspecialchars($projectsMetaData[$repoName]['card_description']) 
                        : htmlspecialchars($project['description'] ?: 'No description provided.');
                ?>

                <div class="project-card-trigger cursor-pointer block rounded-2xl p-[2px] bg-gradient-to-br from-cyan-500 to-indigo-600 hover:from-cyan-400 hover:to-indigo-500 transition-all duration-300 h-full"
                     data-title="<?= htmlspecialchars($repoName) ?>"
                     data-image="<?= $imagePath ?>"
                     data-description="<?= $detailedDescription ?>"
                     data-url="<?= htmlspecialchars($project['html_url']) ?>">
                    
                    <div class="bg-slate-900 rounded-[14px] h-full flex flex-col">
                        <div class="overflow-hidden rounded-t-xl"><img src="<?= $imagePath ?>" alt="Screenshot of <?= htmlspecialchars($repoName) ?>" class="w-full h-48 object-cover"></div>
                        <div class="p-6 flex-grow flex flex-col">
                            <h3 class="text-xl font-bold text-white mb-2"><?= htmlspecialchars($repoName) ?></h3>
                            <p class="text-slate-400 text-sm flex-grow"><?= $cardDescription ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center col-span-full text-slate-400">Could not load projects from GitHub at the moment.</p>
        <?php endif; ?>

    </div>
</section>
        
        <section class="grid grid-cols-1 sm:grid-cols-2 text-center my-16 glass-card rounded-2xl p-8">
            <div class="sm:border-r border-slate-700 py-4">
                <h3 class="text-4xl font-bold gradient-text">10+</h3>
                <p class="text-slate-300">Project Finished</p>
            </div>
            <div class="py-4">
                <h3 class="text-4xl font-bold gradient-text">3+</h3>
                <p class="text-slate-300">Years of Experience</p>
            </div>
        </section>

        <section id="organizational-experience" class="py-15">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Organizational Experience</h2>
            <div class="max-w-4xl mx-auto space-y-8">
                <div class="glass-card p-6 rounded-xl">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-2">
                        <h3 class="text-xl font-bold text-white">Head of Creative Media Specialist</h3>
                        <span class="text-sm text-slate-400 mt-1 sm:mt-0">March 2024 – January 2025</span>
                    </div>
                    <p class="text-md text-slate-300 mb-4">Podcast Sakti Informatika</p>
                    <ul class="list-disc list-inside text-slate-400 space-y-2">
                        <li>Led the planning and production of social media content for the Informatics podcast.</li>
                        <li>Responsible for overseeing creative direction and media strategy to enhance brand visibility and engagement.</li>
                        <li>Managed a team to produce high-quality content, ensuring consistency with the podcast’s goals and vision.</li>
                        <li>Utilized various media tools and platforms to increase audience interaction and reach.</li>
                    </ul>
                </div>
                <div class="glass-card p-6 rounded-xl">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-2">
                        <h3 class="text-xl font-bold text-white">Member of Advocacy, Information, and Communication Division</h3>
                        <span class="text-sm text-slate-400 mt-1 sm:mt-0">March 2022 – May 2023</span>
                    </div>
                    <p class="text-md text-slate-300 mb-4">Informatics Student Association</p>
                    <ul class="list-disc list-inside text-slate-400 space-y-2">
                        <li>Planned and created social media content, achieving monthly targets for audience engagement.</li>
                        <li>Managed content within the Advocacy, Information, and Communication division, ensuring alignment with organizational goals.</li>
                        <li>Collaborated with other divisions to organize events and initiatives, promoting the association’s objectives.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="volunteer-experience" class="py-20">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Volunteer Experience</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="block glass-card rounded-2xl overflow-hidden h-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Be on Fest 2024</h3>
                        <span class="inline-block bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1 rounded-full mb-4">Member of Social Media Division</span>
                        <ul class="list-disc list-inside text-slate-400 space-y-1 text-sm">
                            <li>Designed and created visual and written content for event promotion on social media platforms like Instagram and TikTok.</li>
                            <li>Managed the posting schedule and actively engaged with the audience to build enthusiasm and answer inquiries.</li>
                        </ul>
                    </div>
                </div>
                <div class="block glass-card rounded-2xl overflow-hidden h-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">SWASTAMITAFEST 2024</h3>
                        <span class="inline-block bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1 rounded-full mb-4">Member of Ticketing Division</span>
                        <ul class="list-disc list-inside text-slate-400 space-y-1 text-sm">
                            <li>Managed the online ticket sales process and handled inquiries from prospective buyers about ticket categories and availability.</li>
                            <li>Responsible for the on-site re-registration and ticket exchange process, ensuring a smooth attendee check-in flow.</li>
                        </ul>
                    </div>
                </div>
                <div class="block glass-card rounded-2xl overflow-hidden h-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Cattleya Berbagi 2023</h3>
                        <span class="inline-block bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1 rounded-full mb-4">Member of Event Division</span>
                        <ul class="list-disc list-inside text-slate-400 space-y-1 text-sm">
                            <li>Assisted in designing and structuring the event's flow (rundown) to align with the social activity's goals.</li>
                            <li>Coordinated on-site technical and logistical needs during the event to ensure all segments ran in a timely manner.</li>
                        </ul>
                    </div>
                </div>
                <div class="block glass-card rounded-2xl overflow-hidden h-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">MONITOR 2023</h3>
                        <span class="inline-block bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1 rounded-full mb-4">Member of Event Division</span>
                        <ul class="list-disc list-inside text-slate-400 space-y-1 text-sm">
                            <li>Contributed to the development of the event's concept and schedule, including arranging sessions for speakers and attendees.</li>
                            <li>Served as an on-site liaison officer to ensure the event's smooth execution and address technical challenges.</li>
                        </ul>
                    </div>
                </div>
                <div class="block glass-card rounded-2xl overflow-hidden h-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Khutbatul Arsy 2022</h3>
                        <span class="inline-block bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1 rounded-full mb-4">Member of Documentation Division</span>
                        <ul class="list-disc list-inside text-slate-400 space-y-1 text-sm">
                            <li>Captured photo and video documentation throughout all event sessions to preserve key moments.</li>
                            <li>Performed basic editing on photos and videos for post-event publications and reports.</li>
                        </ul>
                    </div>
                </div>
                <div class="block glass-card rounded-2xl overflow-hidden h-full">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">INFEST 2022</h3>
                        <span class="inline-block bg-slate-700 text-slate-300 text-xs font-semibold px-3 py-1 rounded-full mb-4">Member of Documentation Division</span>
                        <ul class="list-disc list-inside text-slate-400 space-y-1 text-sm">
                            <li>Documented each session of the event through both photography and video recording.</li>
                            <li>Edited and produced multimedia content, such as after-movies and highlight clips, for post-event social media publication.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="documentation-gallery" class="py-15">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Gallery of Documentation</h2>
            <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/SAKTI.jpg" alt="Dokumentasi 1" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">Podcast Sakti Informatika</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/beonfest.jpg" alt="Dokumentasi 2" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">Be On Fest 2024</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/catleya.jpg" alt="Dokumentasi 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">Cattleya Berbagi 2023 - Event Division</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/adfokom.jpg" alt="Dokumentasi 4" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">HIMATIF - Adfokom 2023</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/devfest.jpg" alt="Dokumentasi 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">DevFest 2023</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/himatif.jpg" alt="Dokumentasi 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">HIMATIF UIN BANDUNG</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/monitoring.jpg" alt="Dokumentasi 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">Monitoring HIMATIF 2023 - Event Division</p>
                    </div>
                </div>
                <div class="glass-card rounded-xl overflow-hidden group relative">
                    <img src="assets/images/itfair.jpg" alt="Dokumentasi 3" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white font-semibold text-sm">IT Fair XIII</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer id="connect" class="py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Connect With Me!</h2>
        <p class="mb-8 max-w-md mx-auto text-slate-300">
            I am always open to discussions, collaborations, or new opportunities. Feel free to contact me.
        </p>
        <div class="flex justify-center items-center gap-8 text-4xl">
            
            <a href="https://github.com/dvndnazhrrr20" target="_blank" class="hover:text-white transition-colors duration-300" aria-label="GitHub">
                <i class="devicon-github-original"></i>
            </a>
            
            <a href="mailto:dvndnazhr20@gmail.com" target="_blank" class="hover:text-white transition-colors duration-300" aria-label="Email">
                <i class="fas fa-envelope"></i>
            </a>
            
            <a href="https://wa.me/62881022203132" target="_blank" class="hover:text-white transition-colors duration-300" aria-label="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>

        </div>
        <p class="mt-12 text-slate-500 text-sm">&copy; 2025 Diviandini Azzahra.</p>
    </div>
</footer>

    <div id="project-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center p-4 z-50 hidden">
        <div id="modal-content" class="bg-slate-900 glass-card rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-transform duration-300 scale-95">
            </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile Menu Logic
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Project Modal Logic
            const modal = document.getElementById('project-modal');
            const modalContent = document.getElementById('modal-content');
            const projectCards = document.querySelectorAll('.project-card-trigger');

            const openModal = (title, image, description, url) => {
                modalContent.innerHTML = `
                    <div class="relative">
                        <img src="${image}" alt="Project image for ${title}" class="w-full h-64 object-cover rounded-t-2xl">
                        <button id="close-modal-btn" class="absolute top-4 right-4 text-white bg-black/50 rounded-full w-8 h-8 flex items-center justify-center hover:bg-black/80 transition-colors">&times;</button>
                    </div>
                    <div class="p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-white mb-4">${title}</h2>
                        <p class="text-slate-300 mb-6">${description}</p>
                        <a href="${url}" target="_blank" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
                            <i class="devicon-github-original"></i>
                            Source Code
                        </a>
                    </div>
                `;
                modal.classList.remove('hidden');
                setTimeout(() => modalContent.classList.add('scale-100'), 50);
                
                document.getElementById('close-modal-btn').addEventListener('click', closeModal);
            };

            const closeModal = () => {
                modalContent.classList.remove('scale-100');
                setTimeout(() => modal.classList.add('hidden'), 300);
            };

            projectCards.forEach(card => {
                card.addEventListener('click', () => {
                    const { title, image, description, url } = card.dataset;
                    openModal(title, image, description, url);
                });
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>