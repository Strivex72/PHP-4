<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Dashboard | Update Banner</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    
    <style>
        :root {
            --sidebar-bg: #111111;
            --accent-gold: #c5a059;
            --body-bg: #f8f9fa;
            --status-online: #28a745;
            --status-offline: #6c757d;
            --btn-gradient: linear-gradient(135deg, #c5a059 0%, #a88544 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        #wrapper { display: flex; width: 100%; }
        #sidebar-wrapper {
            min-height: 100vh;
            width: 260px;
            background-color: var(--sidebar-bg);
            transition: margin 0.25s ease-out;
            z-index: 1000;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 30px 20px;
            font-size: 18px;
            color: var(--accent-gold);
            font-weight: 600;
            letter-spacing: 2px;
            border-bottom: 1px solid #222;
        }

        .list-group-item {
            background: transparent !important;
            color: #777 !important;
            border: none !important;
            padding: 15px 25px !important;
            font-size: 14px;
        }

        .list-group-item:hover, .list-group-item.active {
            color: #fff !important;
            background: rgba(197, 160, 89, 0.05) !important;
            border-left: 3px solid var(--accent-gold) !important;
        }

        /* Top Navbar */
        #page-content-wrapper { width: 100%; flex-grow: 1; }
        .navbar { padding: 12px 30px; background: #fff; border-bottom: 1px solid #eee; }

        /* Form Styling */
        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        }
        .form-card label {
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 8px;
            display: block;
            color: #444;
        }
        .form-card input[type="text"], 
        .form-card input[type="url"], 
        .form-card input[type="file"], 
        .form-card textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
        }
        .btn_primary {
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            transition: transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn_primary:hover { transform: translateY(-2px); color: #fff; opacity: 0.9; }

        /* Status Light & Avatar */
        .avatar-container { position: relative; width: 42px; height: 42px; }
        .status-light {
            position: absolute; bottom: 2px; right: 2px;
            width: 12px; height: 12px; border-radius: 50%;
            border: 2px solid #fff;
        }
        .status-online { background-color: var(--status-online); box-shadow: 0 0 5px var(--status-online); }
        .status-offline { background-color: var(--status-offline); }

        #wrapper.toggled #sidebar-wrapper { margin-left: -260px; }
        @media (max-width: 768px) {
            #sidebar-wrapper { margin-left: -260px; }
            #wrapper.toggled #sidebar-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">STRIVEX ADMIN</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item">Analytics</a>
            <a href="#" class="list-group-item">Project Board</a>
            <a href="#" class="list-group-item">Client List</a>
            <a href="#" class="list-group-item active">Web Settings</a>
        </div>
    </div>

    <!-- Main Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="btn btn-outline-dark btn-sm" id="menu-toggle">☰</button>
            
            <div class="ms-auto d-flex align-items-center">
                <div class="dropdown">
                    <div class="d-flex align-items-center" id="profileMenu" data-bs-toggle="dropdown" style="cursor: pointer;">
                        <div class="avatar-container">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=111&color=c5a059" class="rounded-circle" width="40" height="40">
                            <span id="indicator" class="status-light status-online"></span>
                        </div>
                        <div class="ms-2 d-none d-md-block" style="line-height: 1.2;">
                            <div class="fw-bold" style="font-size: 14px;">Master Admin</div>
                            <small id="status-label" class="text-success" style="font-size: 11px;">Active</small>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" id="auth-action">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-12">
                    
                        
                   <div class="form-card p-4">
    <h4 class="fw-bold mb-4">Update Banner Section</h4>
    
    <form action="./controller/dashboard_banner.php" method="POST" enctype="multipart/form-data">
        <div class="row g-4">
            <div class="col-md-4">
                <label for="job_type">Job Type</label>
                <!-- Updated placeholder to reflect your specific role -->
                <input type="text" name="job_type" id="job_type" placeholder="Web Developer & Digital Designer">
            </div>
            
            <div class="col-md-4">
                <label for="moto">Moto</label>
                <!-- Updated placeholder to reflect your specialized technical stack -->
                <input type="text" name="moto" id="moto" placeholder="Frontend & Backend Specialist">
            </div>

            <div class="col-md-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Strivex Admin Lead">
            </div>

            <div class="col-12">
                <label for="short_desc">Short Description</label>
                <!-- Updated placeholder to reflect high-fidelity UI and luxury branding expertise -->
                <textarea name="short_desc" id="short_desc" rows="3" placeholder="Specializing in high-fidelity e-commerce UI, premium automotive marketing, and modular full-stack systems with pixel-perfect precision."></textarea>
            </div>

            <div class="col-md-6">
                <label for="cta">CTA Text</label>
                <input type="text" name="cta" id="cta" placeholder="Explore Projects">
            </div>
            <div class="col-md-6">
                <label for="cta_link">CTA Link (URL)</label>
                <!-- Updated to use your specific profile name -->
                <input type="url" name="cta_link" id="cta_link" placeholder="https://www.facebook.com/strivex.info">
            </div>

            <div class="col-md-4">
                <label for="experience">Years of Experience</label>
                <input type="text" name="experience" id="experience" placeholder="3+ Years">
            </div>
            <div class="col-md-4">
                <label for="projects">Projects</label>
                <input type="text" name="projects" id="projects" placeholder="60+ Completed">
            </div>
            <div class="col-md-4">
                <label for="clients">Happy Clients</label>
                <input type="text" name="clients" id="clients" placeholder="40+ Global">
            </div>

            <div class="col-md-6">
                <label for="cv">Upload CV</label>
                <input type="file" name="cv" id="cv">
                <span class="text-danger" style="font-size: 12px;"><?= $_SESSION['form_errors']['cv_error'] ?? null ?></span>
            </div>
            <div class="col-md-6">
                <label for="image">Profile Image</label>
                <input type="file" name="image" id="image">
                <span class="text-danger" style="font-size: 12px;"><?= $_SESSION['form_errors']['image_error'] ?? null ?></span>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn_primary px-5 py-3 w-100" style="background: var(--btn-gradient); border: none; height: 55px;">
                    Save Changes 
                    <iconify-icon icon="mingcute:check-line" width="24" height="24"></iconify-icon>
                </button>
            </div>
        </div>
    </form>
    <?php unset($_SESSION['form_errors']); ?>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $("#auth-action").click(function(e) {
            e.preventDefault();
            // Toggle Logic (Simulated)
            let isOnline = $("#indicator").hasClass("status-online");
            if (isOnline) {
                $(this).text("Sign In").removeClass("text-danger").addClass("text-primary");
                $("#indicator").removeClass("status-online").addClass("status-offline");
                $("#status-label").text("Offline").removeClass("text-success").addClass("text-muted");
            } else {
                $(this).text("Sign Out").removeClass("text-primary").addClass("text-danger");
                $("#indicator").removeClass("status-offline").addClass("status-online");
                $("#status-label").text("Active").removeClass("text-muted").addClass("text-success");
            }
        });
    });
</script>

</body>
</html>