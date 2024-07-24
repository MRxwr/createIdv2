<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfileConnect - Select a Template</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .container-fluid {
            height: 100vh;
        }

        .row {
            height: 100%;
        }

        .btn-teal {
            background-color: #20c997;
            border-color: #20c997;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-teal:hover {
            background-color: #1ba87e;
            border-color: #1ba87e;
            color: white;
        }

        .logo {
            max-height: 40px;
            width: auto;
        }

        .content-wrapper {
            padding: 2rem;
            overflow-y: auto;
            height: 100vh;
            max-width: 1200px;
            margin: 0 auto;
        }

        .green-background {
            background-color: #20c997;
            position: fixed;
            right: 0;
            top: 0;
            bottom: 0;
            width: 33.333%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .template-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .template-card:hover {
            transform: translateY(-5px);
        }

        .template-image {
            height: 200px;
            object-fit: cover;
        }

        .filter-btn {
            border: 1px solid #dee2e6;
            background-color: white;
            color: #495057;
            transition: all 0.3s ease;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: #20c997;
            color: white;
            border-color: #20c997;
        }

        .template-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .template-popup.active {
            opacity: 1;
            visibility: visible;
        }

        .template-popup-content {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 80%;
            max-height: 80%;
            overflow-y: auto;
        }

        @media (max-width: 767.98px) {
            .green-background {
                display: none !important;
            }
            .content-wrapper {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="content-wrapper">
                    <div class="mb-4">
                        <img src="/api/placeholder/200/40" alt="ProfileConnect Logo" class="logo">
                    </div>
                    <h1 class="mb-3">Select a template</h1>
                    <p class="mb-4">Pick the style that feels right - you can add your content later</p>
                    
                    <div class="mb-4">
                        <button class="btn filter-btn mr-2 mb-2 active" data-filter="all">All</button>
                        <button class="btn filter-btn mr-2 mb-2" data-filter="musician">Musician</button>
                        <button class="btn filter-btn mr-2 mb-2" data-filter="creator">Creator</button>
                        <button class="btn filter-btn mr-2 mb-2" data-filter="business">Business</button>
                        <button class="btn filter-btn mr-2 mb-2" data-filter="personal">Personal</button>
                        <button class="btn filter-btn mr-2 mb-2" data-filter="restaurant">Restaurant</button>
                    </div>

                    <div class="row" id="templateGrid">
                        <!-- Template cards will be dynamically added here -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 green-background">
                <div class="text-center text-white p-4">
                    <h2>Welcome to ProfileConnect!</h2>
                    <p>Choose a template that best represents you or your brand. Don't worry, you can always customize it later.</p>
                    <button class="btn btn-light mt-3">Skip for now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="template-popup" id="templatePopup">
        <div class="template-popup-content">
            <h2 id="popupTemplateName"></h2>
            <img id="popupTemplateImage" src="" alt="Template Preview" class="img-fluid mb-3">
            <p>Would you like to start with this template?</p>
            <button class="btn btn-teal mr-2" onclick="selectTemplate()">Use This Template</button>
            <button class="btn btn-secondary" onclick="closePopup()">Cancel</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <script>
        // Sample template data
        const templates = [
            { name: "Emily Chen", category: "personal", image: "/api/placeholder/300/200" },
            { name: "Lewis Capaldi", category: "musician", image: "/api/placeholder/300/200" },
            { name: "Holly Clyde", category: "creator", image: "/api/placeholder/300/200" },
            { name: "NewTone Store", category: "business", image: "/api/placeholder/300/200" },
            { name: "Tranquil", category: "personal", image: "/api/placeholder/300/200" },
            { name: "Tea N' Up", category: "restaurant", image: "/api/placeholder/300/200" },
            { name: "Tatiana Raine", category: "creator", image: "/api/placeholder/300/200" },
            { name: "Seba Reeks", category: "musician", image: "/api/placeholder/300/200" }
        ];

        function createTemplateCard(template) {
            return `
                <div class="col-md-4 mb-4 template-item ${template.category}">
                    <div class="template-card" onclick="showPopup('${template.name}', '${template.image}')">
                        <img src="${template.image}" alt="${template.name}" class="template-image w-100">
                        <div class="p-3">
                            <h5>${template.name}</h5>
                            <p class="mb-0">${template.category}</p>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderTemplates(filter = 'all') {
            const grid = document.getElementById('templateGrid');
            grid.innerHTML = '';
            templates.forEach(template => {
                if (filter === 'all' || template.category === filter) {
                    grid.innerHTML += createTemplateCard(template);
                }
            });
        }

        function showPopup(name, image) {
            document.getElementById('popupTemplateName').textContent = name;
            document.getElementById('popupTemplateImage').src = image;
            document.getElementById('templatePopup').classList.add('active');
        }

        function closePopup() {
            document.getElementById('templatePopup').classList.remove('active');
        }

        function selectTemplate() {
            // Here you would typically save the user's choice and redirect
            alert('Template selected! Redirecting to customization...');
            closePopup();
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderTemplates();

            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                    e.target.classList.add('active');
                    renderTemplates(e.target.getAttribute('data-filter'));
                });
            });
        });
    </script>
</body>
</html>