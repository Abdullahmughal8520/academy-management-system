<style>
    /* =========================================================
       GLOBAL DELETE MODAL — DARK ADMIN THEME
       ========================================================= */

    .delete-modal-overlay{
        position:fixed !important;
        inset:0 !important;

        background:rgba(4,8,15,.78) !important;

        backdrop-filter:blur(6px) !important;
        -webkit-backdrop-filter:blur(6px) !important;

        display:none;

        align-items:center;
        justify-content:center;

        z-index:99999 !important;

        padding:20px;
    }

    .delete-modal-overlay.show{
        display:flex !important;
    }


    /* =========================================================
       MODAL
       ========================================================= */

    .delete-modal{
        position:relative !important;

        width:100% !important;
        max-width:390px !important;

        background:linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        ) !important;

        border:1px solid #223149 !important;

        border-radius:15px !important;

        padding:30px !important;

        text-align:center;

        box-shadow:
            0 25px 60px rgba(0,0,0,.45),
            0 0 35px rgba(139,92,246,.07) !important;

        animation:deleteModalIn .2s ease;

        overflow:hidden;

        color:#edf3fb !important;
    }


    /* TOP GLOW LINE */

    .delete-modal::before{
        content:"";

        position:absolute;

        top:0;
        left:0;

        width:100%;
        height:1px;

        background:linear-gradient(
            90deg,
            transparent,
            rgba(244,63,94,.65),
            rgba(139,92,246,.45),
            transparent
        );
    }


    /* =========================================================
       ANIMATION
       ========================================================= */

    @keyframes deleteModalIn{

        from{
            opacity:0;
            transform:translateY(10px) scale(.97);
        }

        to{
            opacity:1;
            transform:translateY(0) scale(1);
        }

    }


    /* =========================================================
       DELETE ICON
       ========================================================= */

    .delete-modal-icon{
        width:58px !important;
        height:58px !important;

        margin:0 auto 18px !important;

        border-radius:50% !important;

        display:flex !important;

        align-items:center;
        justify-content:center;

        background:rgba(244,63,94,.10) !important;

        border:1px solid rgba(244,63,94,.20) !important;

        color:#fb7185 !important;

        font-size:24px !important;

        box-shadow:
            0 0 22px rgba(244,63,94,.08) !important;

        filter:
            drop-shadow(
                0 0 6px rgba(244,63,94,.35)
            );
    }


    .delete-modal-icon i{
        filter:
            drop-shadow(
                0 0 5px rgba(244,63,94,.45)
            );
    }


    /* =========================================================
       TITLE
       ========================================================= */

    .delete-modal h3{
        color:#f8fafc !important;

        font-size:16px !important;

        font-weight:850 !important;

        margin:0 0 8px !important;
    }


    /* =========================================================
       DESCRIPTION
       ========================================================= */

    .delete-modal p{
        color:#718096 !important;

        font-size:10px !important;

        line-height:1.6 !important;

        margin:0 0 24px !important;
    }


    /* =========================================================
       BUTTON AREA
       ========================================================= */

    .delete-modal-actions{
        display:flex;

        justify-content:center;

        align-items:center;

        gap:8px;
    }


    /* =========================================================
       CANCEL BUTTON
       ========================================================= */

    .modal-cancel-btn{
        background:#0d1725 !important;

        color:#718096 !important;

        border:1px solid #26364d !important;

        padding:9px 15px !important;

        border-radius:9px !important;

        font-size:10px !important;

        font-weight:850 !important;

        cursor:pointer;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }


    .modal-cancel-btn:hover{
        background:#111c2c !important;

        color:#dbe4f2 !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }


    /* =========================================================
       DELETE BUTTON
       ========================================================= */

    .modal-delete-btn{
        position:relative;

        overflow:hidden;

        background:linear-gradient(
            135deg,
            #be123c,
            #f43f5e
        ) !important;

        color:#fff !important;

        border:1px solid rgba(251,113,133,.35) !important;

        padding:9px 15px !important;

        border-radius:9px !important;

        font-size:10px !important;

        font-weight:850 !important;

        cursor:pointer;

        box-shadow:
            0 7px 18px rgba(244,63,94,.18) !important;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
    }


    /* SHINE */

    .modal-delete-btn::before{
        content:"";

        position:absolute;

        top:0;
        left:-120%;

        width:75%;
        height:100%;

        background:linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.20),
            transparent
        );

        transform:skewX(-20deg);

        transition:left .5s ease;
    }


    .modal-delete-btn:hover{
        color:#fff !important;

        transform:translateY(-2px);

        border-color:rgba(253,164,175,.65) !important;

        box-shadow:
            0 10px 25px rgba(244,63,94,.28) !important;
    }


    .modal-delete-btn:hover::before{
        left:140%;
    }


    .modal-delete-btn i{
        transition:transform .2s ease;
    }


    .modal-delete-btn:hover i{
        transform:scale(1.08);

        filter:
            drop-shadow(
                0 0 5px rgba(255,255,255,.45)
            );
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        .delete-modal{
            max-width:390px !important;

            padding:25px 20px !important;
        }

        .delete-modal h3{
            font-size:15px !important;
        }

        .delete-modal p{
            font-size:9px !important;
        }

    }
</style>


<div
    class="delete-modal-overlay"
    id="deleteModal"
>

    <div class="delete-modal">

        <div class="delete-modal-icon">

            <i class="bi bi-trash3-fill"></i>

        </div>


        <h3>
            Delete Item?
        </h3>


        <p>
            Are you sure you want to delete this item?
            This action cannot be undone.
        </p>


        <div class="delete-modal-actions">

            <button
                type="button"
                class="modal-cancel-btn"
                id="cancelDelete"
            >
                Cancel
            </button>


            <button
                type="button"
                class="modal-delete-btn"
                id="confirmDelete"
            >
                <i class="bi bi-trash3 me-1"></i>
                Yes, Delete
            </button>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('deleteModal');
    const cancelButton = document.getElementById('cancelDelete');
    const confirmButton = document.getElementById('confirmDelete');

    if (!modal || !cancelButton || !confirmButton) {
        return;
    }

    let deleteForm = null;


    /* =========================================================
       OPEN DELETE MODAL
       ========================================================= */

    document.addEventListener('click', function (event) {

        const deleteButton =
            event.target.closest('.delete-trigger');

        if (!deleteButton) {
            return;
        }

        const form =
            deleteButton.closest('.delete-form');

        if (!form) {
            return;
        }

        deleteForm = form;

        modal.classList.add('show');

    });


    /* =========================================================
       CANCEL
       ========================================================= */

    cancelButton.addEventListener('click', function () {

        modal.classList.remove('show');

        deleteForm = null;

    });


    /* =========================================================
       CONFIRM DELETE
       ========================================================= */

    confirmButton.addEventListener('click', function () {

        if (deleteForm) {

            deleteForm.submit();

        }

    });


    /* =========================================================
       CLICK OUTSIDE
       ========================================================= */

    modal.addEventListener('click', function (event) {

        if (event.target === modal) {

            modal.classList.remove('show');

            deleteForm = null;

        }

    });


    /* =========================================================
       ESCAPE KEY
       ========================================================= */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            modal.classList.remove('show');

            deleteForm = null;

        }

    });

});
</script>