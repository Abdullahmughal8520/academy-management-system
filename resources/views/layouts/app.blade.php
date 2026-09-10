<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Academy Management System')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <style>

        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
        }


        /* =========================================================
           MAIN APPLICATION LAYOUT
        ========================================================= */

        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
        }

        /*
        IMPORTANT:
        Bootstrap .row normally uses flex.
        We are intentionally replacing it with CSS Grid
        so sidebar and content ALWAYS stay side-by-side.
        */

        .app-row {
            display: grid !important;

            grid-template-columns: 250px minmax(0, 1fr);

            width: 100%;
            min-height: 100vh;

            margin: 0 !important;
            padding: 0 !important;

            --bs-gutter-x: 0 !important;
            --bs-gutter-y: 0 !important;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .app-row > .sidebar {
            width: 250px !important;
            max-width: 250px !important;

            min-height: 100vh;

            margin: 0 !important;
            padding: 0 !important;

            background:
                linear-gradient(
                    180deg,
                    #111827 0%,
                    #1e1b4b 100%
                );

            position: relative;

            overflow: hidden;
        }


        /* Sidebar decorative glow */

        .sidebar::before {
            content: "";
            position: absolute;

            width: 250px;
            height: 250px;

            top: -120px;
            left: -120px;

            background: rgba(99, 102, 241, 0.15);

            border-radius: 50%;

            pointer-events: none;
        }


        .sidebar::after {
            content: "";
            position: absolute;

            width: 200px;
            height: 200px;

            bottom: -100px;
            right: -100px;

            background: rgba(59, 130, 246, 0.10);

            border-radius: 50%;

            pointer-events: none;
        }


        /* =========================================================
           SIDEBAR BRAND
        ========================================================= */

        .sidebar-brand {
            height: 76px;

            padding: 0 20px;

            display: flex;
            align-items: center;

            border-bottom: 1px solid rgba(255,255,255,0.08);

            position: relative;
            z-index: 2;
        }


        .brand-icon {
            width: 40px;
            height: 40px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #8b5cf6
                );

            color: white;

            font-size: 20px;

            margin-right: 12px;

            box-shadow:
                0 8px 20px rgba(99,102,241,0.25);
        }


        .brand-text {
            color: #ffffff;

            font-size: 17px;

            font-weight: 700;

            line-height: 1.2;
        }


        .brand-subtitle {
            color: #94a3b8;

            font-size: 10px;

            margin-top: 2px;

            letter-spacing: 0.7px;

            text-transform: uppercase;
        }


        /* =========================================================
           SIDEBAR MENU
        ========================================================= */

        .sidebar-menu {
            position: relative;

            z-index: 2;

            padding: 18px 12px 20px;
        }


        .menu-label {
            color: #64748b;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1px;

            padding: 0 10px;

            margin: 8px 0 8px;
        }


        .sidebar-menu a {
            text-decoration: none;
        }


        .sidebar-link {
            display: flex;

            align-items: center;

            width: 100%;

            min-height: 44px;

            padding: 10px 12px;

            margin-bottom: 5px;

            border-radius: 10px;

            color: #aeb9ca;

            font-size: 13px;

            font-weight: 500;

            transition:
                background 0.2s ease,
                color 0.2s ease,
                transform 0.2s ease;
        }


        .sidebar-link i {
            width: 24px;

            margin-right: 10px;

            font-size: 16px;

            color: #718096;

            transition: color 0.2s ease;
        }


        .sidebar-link:hover {
            background: rgba(255,255,255,0.07);

            color: #ffffff;

            transform: translateX(2px);
        }


        .sidebar-link:hover i {
            color: #a5b4fc;
        }


        .sidebar-link.active {
            background:
                linear-gradient(
                    90deg,
                    rgba(99,102,241,0.25),
                    rgba(139,92,246,0.12)
                );

            color: #ffffff;

            box-shadow:
                inset 3px 0 0 #6366f1;
        }


        .sidebar-link.active i {
            color: #818cf8;
        }


        /* =========================================================
           LOGOUT
        ========================================================= */

        .logout-wrapper {
            margin-top: 25px;

            padding-top: 18px;

            border-top: 1px solid rgba(255,255,255,0.07);
        }


        .logout-btn {
            border-color: rgba(248,113,113,0.35) !important;

            color: #fca5a5 !important;

            background: rgba(127,29,29,0.08) !important;

            border-radius: 9px;

            font-size: 13px;

            padding: 10px;
        }


        .logout-btn:hover {
            background: rgba(127,29,29,0.25) !important;

            color: #fecaca !important;
        }


        /* =========================================================
           MAIN WRAPPER
        ========================================================= */

        .app-row > .main-wrapper {
            width: auto !important;

            max-width: none !important;

            min-width: 0 !important;

            min-height: 100vh;

            margin: 0 !important;

            padding: 0 !important;

            background: #f4f7fb;

            overflow-x: hidden;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

       /* =========================================================
   TOPBAR — DARK ACADEMY COMMAND BAR
========================================================= */

.topbar{
    min-height:76px;
    width:100%;

    display:flex;
    align-items:center;
    justify-content:space-between;

    padding:0 28px;

    background:
        linear-gradient(
            135deg,
            rgba(15,24,38,.98),
            rgba(8,14,23,.98)
        );

    border-bottom:1px solid #1b293c;

    position:relative;
    z-index:10;

    box-shadow:
        0 8px 25px rgba(0,0,0,.10);

    overflow:hidden;
}


/* subtle top glow */

.topbar::before{
    content:"";

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.55),
            rgba(34,211,238,.45),
            transparent
        );
}


/* =========================================================
   LEFT SIDE
========================================================= */

.topbar-left{
    display:flex;
    align-items:center;
    gap:12px;
}


/* small glowing page icon */

.topbar-page-icon{
    width:38px;
    height:38px;

    border-radius:11px;

    display:grid;
    place-items:center;

    background:
        linear-gradient(
            135deg,
            rgba(139,92,246,.15),
            rgba(34,211,238,.06)
        );

    border:1px solid rgba(139,92,246,.25);

    color:#a78bfa;

    box-shadow:
        0 0 15px rgba(139,92,246,.08),
        inset 0 0 12px rgba(139,92,246,.04);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.topbar:hover .topbar-page-icon{
    transform:scale(1.06);

    border-color:
        rgba(139,92,246,.45);

    box-shadow:
        0 0 20px rgba(139,92,246,.16);
}

.topbar-page-icon i{
    font-size:16px;

    filter:
        drop-shadow(
            0 0 5px rgba(167,139,250,.65)
        );
}


/* =========================================================
   PAGE TITLE
========================================================= */

.page-title{
    margin:0;

    font-size:20px;

    font-weight:850;

    letter-spacing:-.2px;

    color:#f8fafc;

    transition:
        text-shadow .25s ease,
        transform .25s ease;
}

.topbar:hover .page-title{
    text-shadow:
        0 0 16px rgba(255,255,255,.08);

    transform:translateX(1px);
}


.page-subtitle{
    margin:3px 0 0;

    font-size:10px;

    color:#64758c;

    letter-spacing:.35px;

    transition:
        color .25s ease;
}

.topbar:hover .page-subtitle{
    color:#7d8da4;
}

/* =========================================================
   DASHBOARD DARK THEME
========================================================= */

body:has(.admin-dash),
body:has(.td),
body:has(.sd) {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.admin-dash) .main-wrapper,
body:has(.td) .main-wrapper,
body:has(.sd) .main-wrapper {
    background: #080e17 !important;
}

body:has(.admin-dash) .page-content,
body:has(.td) .page-content,
body:has(.sd) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.admin-dash) .topbar,
body:has(.td) .topbar,
body:has(.sd) .topbar {
    background: rgba(8, 14, 23, 0.95);
    border-bottom-color: #1b2738;
}

body:has(.admin-dash) .page-title,
body:has(.td) .page-title,
body:has(.sd) .page-title {
    color: #f8fafc;
}

body:has(.admin-dash) .page-subtitle,
body:has(.td) .page-subtitle,
body:has(.sd) .page-subtitle {
    color: #64748b;
}

body:has(.admin-dash) .user-name,
body:has(.td) .user-name,
body:has(.sd) .user-name {
    color: #dbe4f2;
}

body:has(.admin-dash) .user-area,
body:has(.td) .user-area,
body:has(.sd) .user-area {
    border-left-color: #1b2738;
}

body:has(.admin-dash) .topbar-icon,
body:has(.td) .topbar-icon,
body:has(.sd) .topbar-icon {
    background: #0d1521;
    border-color: #1b2738;
    color: #718096;
}


/* =========================================================
   EXAMS DARK THEME
========================================================= */

body:has(.exam-form-page),
body:has(.exams-page) {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.exam-form-page) .main-wrapper,
body:has(.exams-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.exam-form-page) .page-content,
body:has(.exams-page) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.exam-form-page) .topbar,
body:has(.exams-page) .topbar {
    background: rgba(8, 14, 23, 0.95);
    border-bottom-color: #1b2738;
}

body:has(.exam-form-page) .page-title,
body:has(.exams-page) .page-title {
    color: #f8fafc;
}

body:has(.exam-form-page) .page-subtitle,
body:has(.exams-page) .page-subtitle {
    color: #64748b;
}


/* =========================================================
   RIGHT SIDE
========================================================= */

.topbar-right{
    display:flex;

    align-items:center;

    gap:8px;
}


/* =========================================================
   TOPBAR ICONS
========================================================= */

/* =========================================================
   TOPBAR DROPDOWNS
========================================================= */

.topbar-dropdown{
    position:relative;
}


/* =========================================================
   TOPBAR ICON
========================================================= */

.topbar-icon{
    position:relative;

    width:35px;
    height:35px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#718096;

    background:#0d1725;

    border:1px solid #1d2b3e;

    border-radius:9px;

    text-decoration:none;

    overflow:hidden;

    cursor:pointer;

    transition:
        transform .25s ease,
        color .25s ease,
        background .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}


/* SHINE */

.topbar-icon::before{
    content:"";

    position:absolute;

    top:0;
    left:-120%;

    width:75%;
    height:100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.28),
            rgba(34,211,238,.22),
            transparent
        );

    transform:skewX(-20deg);

    transition:left .55s ease;
}


/* ICON */

.topbar-icon i{
    position:relative;

    z-index:2;

    font-size:14px;

    transition:
        transform .25s ease,
        color .25s ease,
        filter .25s ease;
}


/* HOVER */

.topbar-icon:hover,
.topbar-icon.active{
    color:#c4b5fd;

    background:#111c2c;

    border-color:rgba(139,92,246,.48);

    transform:translateY(-3px);

    box-shadow:
        0 8px 20px rgba(0,0,0,.28),
        0 0 16px rgba(139,92,246,.13);
}


.topbar-icon:hover::before,
.topbar-icon.active::before{
    left:140%;
}


.topbar-icon:hover i,
.topbar-icon.active i{
    color:#a78bfa;

    transform:
        scale(1.12)
        translateY(-1px);

    filter:
        drop-shadow(
            0 0 5px rgba(167,139,250,.85)
        )
        drop-shadow(
            0 0 10px rgba(139,92,246,.35)
        );
}


.topbar-icon:active{
    transform:translateY(-1px) scale(.96);
}


/* =========================================================
   NOTIFICATION DOT
========================================================= */

.notification-dot{
    position:absolute;

    top:5px;
    right:5px;

    width:6px;
    height:6px;

    border-radius:50%;

    background:#22d3ee;

    border:1px solid #0d1725;

    box-shadow:
        0 0 7px rgba(34,211,238,.85);

    z-index:3;

    animation:notificationPulse 2s infinite;
}


@keyframes notificationPulse{

    0%,100%{
        box-shadow:
            0 0 5px rgba(34,211,238,.65);
    }

    50%{
        box-shadow:
            0 0 12px rgba(34,211,238,1);
    }

}


/* =========================================================
   DROPDOWN PANEL
========================================================= */

.topbar-panel{
    position:absolute;

    top:calc(100% + 12px);

    right:0;

    width:285px;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid #223149;

    border-radius:14px;

    box-shadow:
        0 20px 45px rgba(0,0,0,.42),
        0 0 25px rgba(139,92,246,.07);

    overflow:hidden;

    opacity:0;

    visibility:hidden;

    transform:
        translateY(-8px)
        scale(.97);

    transform-origin:top right;

    transition:
        opacity .2s ease,
        visibility .2s ease,
        transform .2s ease;

    z-index:9999;
}


.topbar-panel.show{
    opacity:1;

    visibility:visible;

    transform:
        translateY(0)
        scale(1);
}


/* TOP GLOW */

.topbar-panel::before{
    content:"";

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.65),
            rgba(34,211,238,.45),
            transparent
        );
}


/* =========================================================
   PANEL HEADER
========================================================= */

.panel-header{
    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:12px;

    padding:14px 15px;

    border-bottom:1px solid #1e2b3e;
}


.panel-title{
    color:#eef3fb;

    font-size:11px;

    font-weight:850;
}


.panel-title i{
    color:#a78bfa;

    filter:
        drop-shadow(
            0 0 5px rgba(167,139,250,.45)
        );
}


.panel-subtitle{
    color:#64758c;

    font-size:8px;

    margin-top:3px;
}


.panel-badge,
.notification-count{
    display:inline-flex;

    align-items:center;

    justify-content:center;

    min-width:27px;

    height:20px;

    padding:0 7px;

    border-radius:999px;

    background:
        rgba(139,92,246,.10);

    border:1px solid rgba(139,92,246,.20);

    color:#a78bfa;

    font-size:8px;

    font-weight:850;
}


/* =========================================================
   CALENDAR
========================================================= */

.calendar-date{
    display:flex;

    align-items:center;

    gap:11px;

    padding:16px;
}


.calendar-day{
    width:42px;
    height:42px;

    display:grid;

    place-items:center;

    border-radius:11px;

    background:
        linear-gradient(
            135deg,
            #312e81,
            #7c3aed
        );

    color:#fff;

    font-size:16px;

    font-weight:900;

    box-shadow:
        0 7px 18px rgba(124,58,237,.20);
}


.calendar-month{
    color:#dbe4f2;

    font-size:10px;

    font-weight:850;
}


.calendar-weekday{
    color:#64758c;

    font-size:8px;

    margin-top:3px;
}


/* =========================================================
   PANEL LINK
========================================================= */

.panel-link{
    display:flex;

    align-items:center;

    gap:9px;

    margin:0 12px 12px;

    padding:10px 11px;

    border-radius:9px;

    background:#0d1725;

    border:1px solid #1d2b3e;

    color:#aab7ca;

    text-decoration:none;

    font-size:9px;

    font-weight:750;

    transition:
        background .2s ease,
        border-color .2s ease,
        color .2s ease,
        transform .2s ease;
}


.panel-link i:first-child{
    color:#a78bfa;

    font-size:11px;
}


.panel-link i:last-child{
    color:#52637a;

    font-size:8px;

    transition:transform .2s ease;
}


.panel-link:hover{
    color:#f1f5f9;

    background:#111c2c;

    border-color:#344760;

    transform:translateY(-2px);
}


.panel-link:hover i:last-child{
    transform:translateX(3px);

    color:#a78bfa;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-panel{
    text-align:center;

    padding:27px 15px 25px;
}


.empty-panel-icon{
    width:40px;
    height:40px;

    margin:0 auto 10px;

    display:grid;

    place-items:center;

    border-radius:11px;

    background:#111d2d;

    border:1px solid #223149;

    color:#53647c;

    font-size:15px;
}


.empty-panel-title{
    color:#cbd5e1;

    font-size:10px;

    font-weight:800;
}


.empty-panel-text{
    color:#596a82;

    font-size:8px;

    margin-top:4px;
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:767.98px){

    .topbar-panel{
        position:fixed;

        top:65px;

        right:10px;

        width:
            min(
                285px,
                calc(100vw - 20px)
            );
    }

    .topbar-icon{
        width:32px;
        height:32px;
    }

}

/* =========================================================
   USER AREA
========================================================= */

.user-area{
    display:flex;

    align-items:center;

    gap:10px;

    margin-left:6px;

    padding-left:13px;

    border-left:1px solid #1e2b3e;

    cursor:default;
}


/* =========================================================
   USER AVATAR
========================================================= */

.user-avatar{
    position:relative;

    width:38px;
    height:38px;

    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#fff;

    background:
        linear-gradient(
            135deg,
            #312e81,
            #7c3aed
        );

    border:1px solid rgba(167,139,250,.30);

    font-size:13px;

    font-weight:900;

    box-shadow:
        0 0 16px rgba(124,58,237,.15);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.user-avatar::after{
    content:"";

    position:absolute;

    right:-2px;
    bottom:-2px;

    width:9px;
    height:9px;

    border-radius:50%;

    background:#22c55e;

    border:2px solid #0b1420;

    box-shadow:
        0 0 8px rgba(34,197,94,.75);
}

.user-area:hover .user-avatar{
    transform:
        translateY(-2px)
        scale(1.04);

    border-color:
        rgba(167,139,250,.55);

    box-shadow:
        0 0 22px rgba(124,58,237,.25);
}


/* =========================================================
   USER INFO
========================================================= */

.user-info{
    line-height:1.2;

    min-width:75px;
}

.user-name{
    color:#e7edf6;

    font-size:11px;

    font-weight:850;

    transition:
        color .2s ease;
}

.user-area:hover .user-name{
    color:#fff;
}

.user-role{
    display:flex;
    align-items:center;
    gap:5px;

    color:#718096;

    font-size:8px;

    margin-top:4px;

    text-transform:uppercase;

    letter-spacing:.7px;

    font-weight:800;
}

.user-role::before{
    content:"";

    width:5px;
    height:5px;

    border-radius:50%;

    background:#22c55e;

    box-shadow:
        0 0 7px rgba(34,197,94,.75);
}


/* =========================================================
   MOBILE TOPBAR
========================================================= */

@media(max-width:767.98px){

    .topbar{
        padding:0 15px;
        min-height:65px;
    }

    .topbar-page-icon{
        width:34px;
        height:34px;
    }

    .page-title{
        font-size:17px;
    }

    .page-subtitle{
        display:none;
    }

    .topbar-right{
        gap:5px;
    }

    .topbar-icon{
        width:31px;
        height:31px;
    }

    .user-info{
        display:none;
    }

    .user-area{
        padding-left:7px;
        margin-left:2px;
    }

    .user-avatar{
        width:34px;
        height:34px;
    }
}

    

        /* =========================================================
           PAGE CONTENT
        ========================================================= */
.page-content {
    width: 100%;
    margin: 0 !important;
    padding: 22px 24px 0 24px !important;
    min-height: calc(100vh - 76px);
}

        /* =========================================================
           DASHBOARD DARK THEME
        ========================================================= */

      /* =========================================================
   EXAMS DARK THEME
========================================================= */

body:has(.exam-form-page),
body:has(.exams-page) {
    background: #080e17;
    color: #dbe4f2;
}

body:has(.exam-form-page) .main-wrapper,
body:has(.exams-page) .main-wrapper {
    background: #080e17;
}

body:has(.exam-form-page) .page-content,
body:has(.exams-page) .page-content {
    background: #080e17;
    color: #dbe4f2;
}

body:has(.exam-form-page) .topbar,
body:has(.exams-page) .topbar {
    background: rgba(8, 14, 23, 0.95);
    border-bottom-color: #1b2738;
}

body:has(.exam-form-page) .page-title,
body:has(.exams-page) .page-title {
    color: #f8fafc;
}

body:has(.exam-form-page) .page-subtitle,
body:has(.exams-page) .page-subtitle {
    color: #64748b;
}

        /* =========================================================
           BOOTSTRAP SAFETY
        ========================================================= */

        .app-row > .sidebar.col-md-3,
        .app-row > .sidebar.col-lg-2 {
            float: none !important;
        }


        .app-row > .main-wrapper.col-md-9,
        .app-row > .main-wrapper.col-lg-10 {
            float: none !important;
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 767.98px) {

            .app-row {
                display: block !important;

                min-height: auto;
            }


            .app-row > .sidebar {
                width: 100% !important;

                max-width: 100% !important;

                min-height: auto;
            }


            .app-row > .main-wrapper {
                width: 100% !important;

                max-width: 100% !important;
            }


            .sidebar-brand {
                height: 65px;
            }


            .sidebar-menu {
                padding-bottom: 15px;
            }


            .topbar {
                padding: 0 15px;

                min-height: 65px;
            }


            .page-title {
                font-size: 17px;
            }


            .page-subtitle {
                display: none;
            }


            .topbar-right {
                gap: 7px;
            }


            .topbar-icon {
                width: 32px;

                height: 32px;
            }


            .user-info {
                display: none;
            }


            .page-content {
                padding: 20px 15px;
            }
        }
.main-wrapper {
    min-height: 100vh !important;
}

.page-content {
    min-height: calc(100vh - 76px) !important;
}

/* TOPBAR DROPDOWNS - ALWAYS ABOVE PAGE CONTENT */
.topbar {
    position: relative !important;
    z-index: 1000 !important;
    overflow:visible !important;
}

.topbar-right {
    position: relative !important;
    z-index: 1001 !important;
}

.topbar-dropdown {
    position: relative !important;
    z-index: 1002 !important;
}

.topbar-panel {
    position: absolute !important;
    top: calc(100% + 10px) !important;
    right: 0 !important;
    z-index: 99999 !important;
}

/* Keep page content below topbar dropdowns */
.main-wrapper {
    position: relative;
    z-index: 1;
}

.page-content {
    position: relative;
    z-index: 1;
}
    </style>

    @stack('styles')
</head>

<body>

    <div class="container-fluid">

        <!-- MAIN APP ROW -->
        <div class="row app-row">

            <!-- =====================================================
                 SIDEBAR
            ====================================================== -->

            <aside class="sidebar">

                <!-- BRAND -->

                <div class="sidebar-brand">

                    <div class="brand-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div>
                        <div class="brand-text">
                            AcademyPro
                        </div>

                        <div class="brand-subtitle">
                            Smart Academy Management
                        </div>
                    </div>

                </div>


                <!-- SIDEBAR MENU -->

                <div class="sidebar-menu">

                    @if(auth()->check() && auth()->user()->role === 'admin')

                        <div class="menu-label">
                            Main Menu
                        </div>

                        <a href="{{ route('dashboard') }}"
                           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                            <i class="bi bi-grid-1x2-fill"></i>

                            <span>Dashboard</span>

                        </a>


                        <a href="{{ route('students.index') }}"
                           class="sidebar-link {{ request()->routeIs('students.*') ? 'active' : '' }}">

                            <i class="bi bi-people-fill"></i>

                            <span>Students</span>

                        </a>


                        <a href="{{ route('teachers.index') }}"
                           class="sidebar-link {{ request()->routeIs('teachers.*') ? 'active' : '' }}">

                            <i class="bi bi-person-badge-fill"></i>

                            <span>Teachers</span>

                        </a>


                        <a href="{{ route('courses.index') }}"
                           class="sidebar-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">

                            <i class="bi bi-book-fill"></i>

                            <span>Courses</span>

                        </a>


                        <a href="{{ route('classes.index') }}"
                           class="sidebar-link {{ request()->routeIs('classes.*') ? 'active' : '' }}">

                            <i class="bi bi-building"></i>

                            <span>Classes</span>

                        </a>


                        <a href="{{ route('groups.index') }}"
                           class="sidebar-link {{ request()->routeIs('groups.*') ? 'active' : '' }}">

                            <i class="bi bi-collection-fill"></i>

                            <span>Groups</span>

                        </a>


                        <a href="{{ route('subjects.index') }}"
                           class="sidebar-link {{ request()->routeIs('subjects.*') ? 'active' : '' }}">

                            <i class="bi bi-journal-text"></i>

                            <span>Subjects</span>

                        </a>

                        <a href="{{ route('exams.index') }}"
   class="sidebar-link {{ request()->routeIs('exams.*') ? 'active' : '' }}">
    <i class="bi bi-file-earmark-text-fill"></i>
    <span>Exams</span>
</a>

{{-- FEE MANAGEMENT --}}
<a href="{{ route('fees.index') }}"
   class="sidebar-link {{ request()->routeIs('fees.*') ? 'active' : '' }}">

    <i class="bi bi-cash-stack"></i>

    <span>Fee Management</span>

</a>


{{-- FEE STRUCTURES --}}
<a href="{{ route('fee-structures.index') }}"
   class="sidebar-link {{ request()->routeIs('fee-structures.*') ? 'active' : '' }}">

    <i class="bi bi-wallet2"></i>

    <span>Fee Structures</span>

</a>

                        <a href="{{ route('teacher-assignments.index') }}"
                           class="sidebar-link {{ request()->routeIs('teacher-assignments.*') ? 'active' : '' }}">

                            <i class="bi bi-person-workspace"></i>

                            <span>Teacher Assignments</span>

                        </a>


                        <a href="{{ route('schedules.index') }}"
                           class="sidebar-link {{ request()->routeIs('schedules.*') ? 'active' : '' }}">

                            <i class="bi bi-calendar3"></i>

                            <span>Schedules</span>

                        </a>


<a href="{{ route('admin.weekly-timetable') }}"
   class="sidebar-link {{ request()->routeIs('admin.weekly-timetable') ? 'active' : '' }}">
    <i class="bi bi-calendar-week-fill"></i>
    <span>Weekly Timetable</span>
</a>
                    @elseif(auth()->check() && auth()->user()->role === 'teacher')

                        <div class="menu-label">
                            Teacher Workspace
                        </div>


                        <a href="{{ route('teacher.dashboard') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">

                            <i class="bi bi-grid-1x2-fill"></i>

                            <span>Dashboard</span>

                        </a>


                        <a href="{{ route('teacher.classes') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.classes') ? 'active' : '' }}">

                            <i class="bi bi-building"></i>

                            <span>My Classes</span>

                        </a>


                        <a href="{{ route('teacher.subjects') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.subjects') ? 'active' : '' }}">

                            <i class="bi bi-journal-bookmark-fill"></i>

                            <span>My Subjects</span>

                        </a>


<a href="{{ route('teacher.attendance.index') }}"
   class="sidebar-link {{ request()->routeIs('teacher.attendance.*') ? 'active' : '' }}">

    <i class="bi bi-check2-square"></i>

    <span>Attendance</span>

</a>

                        <a href="{{ route('teacher.assignments') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.assignments') ? 'active' : '' }}">

                            <i class="bi bi-file-earmark-text-fill"></i>

                            <span>Assignments</span>

                        </a>


                        <a href="{{ route('teacher.timetable') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.timetable') ? 'active' : '' }}">

                            <i class="bi bi-calendar-week-fill"></i>

                            <span>My Timetable</span>

                        </a>


                        <a href="{{ route('teacher.profile') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.profile') ? 'active' : '' }}">

                            <i class="bi bi-person-circle"></i>

                            <span>My Profile</span>

                        </a>


                        <a href="{{ route('teacher.change-password') }}"
                           class="sidebar-link {{ request()->routeIs('teacher.change-password') ? 'active' : '' }}">

                            <i class="bi bi-shield-lock-fill"></i>

                            <span>Security</span>

                        </a>

                    @elseif(auth()->check() && auth()->user()->role === 'student')

                        <div class="menu-label">
                            Student Portal
                        </div>


                        <a href="{{ route('student.dashboard') }}"
                           class="sidebar-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">

                            <i class="bi bi-grid-1x2-fill"></i>

                            <span>Dashboard</span>

                        </a>


                        <a href="{{ route('student.timetable') }}"
                           class="sidebar-link {{ request()->routeIs('student.timetable') ? 'active' : '' }}">

                            <i class="bi bi-calendar-week-fill"></i>

                            <span>My Timetable</span>

                        </a>


                        <a href="{{ route('student.attendance') }}"
                           class="sidebar-link">

                            <i class="bi bi-check2-square"></i>

                            <span>Attendance</span>

                        </a>


                        <a href="{{ route('student.subjects') }}"
                           class="sidebar-link">

                            <i class="bi bi-book-fill"></i>

                            <span>My Subjects</span>

                        </a>


                        <!-- <a href="{{ route('student.dashboard') }}"
                           class="sidebar-link">

                            <i class="bi bi-bar-chart-fill"></i>

                            <span>Academic Overview</span>

                        </a> -->

                    @endif


                    <!-- LOGOUT -->

                    @auth

                        <div class="logout-wrapper">

                            <form
                                action="{{ route('logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-outline-danger w-100 logout-btn"
                                >

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </div>

                    @endauth

                </div>

            </aside>


            <!-- =====================================================
                 MAIN CONTENT
            ====================================================== -->

            <div class="main-wrapper">

                <!-- TOPBAR -->

                <header class="topbar">

                    <div>

                        <h1 class="page-title">
                            @yield('title', 'Dashboard')
                        </h1>

                        <p class="page-subtitle">
                            Academy Management System
                        </p>

                    </div>

<div class="topbar-right">

    {{-- CALENDAR --}}
    <div class="topbar-dropdown">

        <button
            type="button"
            class="topbar-icon topbar-action"
            data-dropdown="calendarDropdown"
            title="Calendar"
        >
            <i class="bi bi-calendar3"></i>
        </button>

        <div class="topbar-panel calendar-panel" id="calendarDropdown">

            <div class="panel-header">

                <div>
                    <div class="panel-title">
                        <i class="bi bi-calendar3 me-1"></i>
                        Calendar
                    </div>

                    <div class="panel-subtitle">
                        Academy schedule
                    </div>
                </div>

                <span class="panel-badge">
                    Today
                </span>

            </div>

            <div class="calendar-date">

                <div class="calendar-day">
                    {{ now()->format('d') }}
                </div>

                <div>
                    <div class="calendar-month">
                        {{ now()->format('F Y') }}
                    </div>

                    <div class="calendar-weekday">
                        {{ now()->format('l') }}
                    </div>
                </div>

            </div>

            <a
                href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('admin.weekly-timetable') : '#' }}"
                class="panel-link"
            >
                <i class="bi bi-calendar-week-fill"></i>
                <span>View Weekly Timetable</span>
                <i class="bi bi-chevron-right ms-auto"></i>
            </a>

        </div>

    </div>


    {{-- NOTIFICATIONS --}}
    <div class="topbar-dropdown">

        <button
            type="button"
            class="topbar-icon topbar-action notification-action"
            data-dropdown="notificationDropdown"
            title="Notifications"
        >
            <i class="bi bi-bell"></i>

            <span class="notification-dot"></span>
        </button>


        <div
            class="topbar-panel notification-panel"
            id="notificationDropdown"
        >

            <div class="panel-header">

                <div>
                    <div class="panel-title">
                        <i class="bi bi-bell me-1"></i>
                        Notifications
                    </div>

                    <div class="panel-subtitle">
                        Latest academy updates
                    </div>
                </div>

                <span class="notification-count">
                    0
                </span>

            </div>


            <div class="empty-panel">

                <div class="empty-panel-icon">
                    <i class="bi bi-bell-slash"></i>
                </div>

                <div class="empty-panel-title">
                    No new notifications
                </div>

                <div class="empty-panel-text">
                    You're all caught up.
                </div>

            </div>

        </div>

    </div>


    {{-- MESSAGES --}}
    <div class="topbar-dropdown">

        <button
            type="button"
            class="topbar-icon topbar-action"
            data-dropdown="messageDropdown"
            title="Messages"
        >
            <i class="bi bi-envelope"></i>
        </button>


        <div
            class="topbar-panel message-panel"
            id="messageDropdown"
        >

            <div class="panel-header">

                <div>
                    <div class="panel-title">
                        <i class="bi bi-envelope me-1"></i>
                        Messages
                    </div>

                    <div class="panel-subtitle">
                        Academy communication
                    </div>
                </div>

                <span class="notification-count">
                    0
                </span>

            </div>


            <div class="empty-panel">

                <div class="empty-panel-icon">
                    <i class="bi bi-chat-square-text"></i>
                </div>

                <div class="empty-panel-title">
                    No new messages
                </div>

                <div class="empty-panel-text">
                    Your inbox is currently empty.
                </div>

            </div>

        </div>

    </div>


    {{-- USER --}}
    @auth

        <div class="user-area">

            <div class="user-avatar">

                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

            </div>


            <div class="user-info">

                <div class="user-name">

                    {{ auth()->user()->name }}

                </div>


                <div class="user-role">

                    {{ ucfirst(auth()->user()->role) }}

                </div>

            </div>

        </div>

    @endauth

</div>

                </header>


                <!-- PAGE CONTENT -->

                <main class="page-content">

                    @yield('content')

                </main>

            </div>

        </div>

    </div>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    @stack('scripts')

    @yield('scripts')

    <script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.topbar-action');

    buttons.forEach(function (button) {

        button.addEventListener('click', function (event) {

            event.stopPropagation();

            const dropdownId = button.dataset.dropdown;
            const dropdown = document.getElementById(dropdownId);

            if (!dropdown) return;

            document.querySelectorAll('.topbar-panel.show').forEach(function (panel) {

                if (panel !== dropdown) {
                    panel.classList.remove('show');
                }

            });

            document.querySelectorAll('.topbar-action.active').forEach(function (activeButton) {

                if (activeButton !== button) {
                    activeButton.classList.remove('active');
                }

            });

            dropdown.classList.toggle('show');
            button.classList.toggle('active');

        });

    });


    /* CLOSE WHEN CLICKING OUTSIDE */

    document.addEventListener('click', function (event) {

        if (!event.target.closest('.topbar-dropdown')) {

            document.querySelectorAll('.topbar-panel.show').forEach(function (panel) {
                panel.classList.remove('show');
            });

            document.querySelectorAll('.topbar-action.active').forEach(function (button) {
                button.classList.remove('active');
            });

        }

    });


    /* CLOSE WITH ESC */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            document.querySelectorAll('.topbar-panel.show').forEach(function (panel) {
                panel.classList.remove('show');
            });

            document.querySelectorAll('.topbar-action.active').forEach(function (button) {
                button.classList.remove('active');
            });

        }

    });

});
</script>

</body>
</html>