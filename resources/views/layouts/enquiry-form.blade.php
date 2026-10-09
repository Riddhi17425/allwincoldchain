
<style>
    /* =====================================================
       FLOATING ENQUIRY BUTTON
    ===================================================== */

    .contact-trigger {
        position: fixed;
        right: 0;
        top: 60%;

        width: 45px;
        height: 155px;

        transform: translateY(-50%);

        z-index: 9998;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 0;

        border: 0;
        border-radius: 8px 0 0 8px;

        background: #0784BE;

        cursor: pointer;

        transition:
            transform .35s cubic-bezier(.22, 1, .36, 1),
            background-color .3s ease;
    }


    .contact-trigger:hover {
        transform:
            translateY(-50%)
            translateX(-5px);

        background: #075B86;
    }


    .contact-trigger:active {
        transform:
            translateY(-50%)
            translateX(-2px);
    }


    .contact-trigger span {
        display: block;

        writing-mode: vertical-rl;

        text-orientation: mixed;

        transform: rotate(180deg);

        white-space: nowrap;

        color: #ffffff;

        font-size: 15px;

        font-weight: 700;

        line-height: 1;

        letter-spacing: .01em;
    }



    /* =====================================================
       TRANSPARENT OVERLAY

       IMPORTANT:
       This does NOT change the homepage background.
       No blur.
       No dark background.
    ===================================================== */

    .contact-overlay {
        position: fixed;

        inset: 0;

        z-index: 9999;

        background: transparent !important;

        opacity: 0;

        visibility: hidden;

        pointer-events: none;

        transition:
            opacity .25s ease,
            visibility .25s ease;
    }


    .contact-overlay.active {
        opacity: 1;

        visibility: visible;

        pointer-events: none;

        background: transparent !important;
    }



    /* =====================================================
       CONTACT PANEL
    ===================================================== */

    .contact-panel {
        position: fixed;

        right: 68px;

        top: 50%;

        width: min(
            360px,
            calc(100vw - 90px)
        );

        max-height:
            calc(100vh - 40px);

        z-index: 10000;

        display: flex;

        flex-direction: column;

        overflow: hidden;

        background: #ffffff;

        border:
            1px solid
            rgba(7, 132, 190, .12);

        border-radius: 12px;

        box-shadow:
            0 12px 35px
            rgba(0, 45, 65, .18);

        transform:
            translate(
                20px,
                -50%
            )
            scale(.96);

        transform-origin:
            right center;

        visibility: hidden;

        opacity: 0;

        transition:
            transform .35s
            cubic-bezier(.22, 1, .36, 1),

            opacity .25s ease,

            visibility .35s ease;
    }


    .contact-panel.active {
        transform:
            translate(
                0,
                -50%
            )
            scale(1);

        visibility: visible;

        opacity: 1;
    }



    /* =====================================================
       TOP BLUE LINE
    ===================================================== */

    .panel-top-line {
        position: absolute;

        left: 0;

        top: 0;

        width: 100%;

        height: 4px;

        background: #0784BE;
    }



    /* =====================================================
       HEADER
    ===================================================== */

    .contact-header {
        position: relative;

        flex-shrink: 0;

        min-height: 52px;

        display: flex;

        align-items: center;

        padding:
            12px
            15px
            7px;
    }


    .contact-title {
        margin: 0;

        padding: 0;

        color: #1B1B1B;

        font-size: 18px;

        line-height: 1.2;

        font-weight: 700;
    }



    /* =====================================================
       CLOSE BUTTON
    ===================================================== */

    .contact-close {
        position: absolute;

        top: 10px;

        right: 12px;

        width: 30px;

        height: 30px;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 0;

        border:
            1px solid
            #E3E8EC;

        border-radius: 50%;

        background: #F8FAFB;

        cursor: pointer;

        transition:
            background .3s ease,

            border-color .3s ease,

            transform .35s ease;
    }


    .contact-close svg {
        width: 15px;

        height: 15px;

        stroke: #222222;

        transition:
            stroke .3s ease;
    }


    .contact-close:hover {
        background: #0784BE;

        border-color: #0784BE;

        transform: rotate(90deg);
    }


    .contact-close:hover svg {
        stroke: #ffffff;
    }



    /* =====================================================
       FORM WRAPPER
    ===================================================== */

    .contact-form-wrapper {
        flex: 0 1 auto;

        overflow-y: auto;

        padding:
            4px
            15px
            15px;

        scrollbar-width: thin;

        scrollbar-color:
            #CBDDE6
            transparent;
    }


    .contact-form-wrapper::-webkit-scrollbar {
        width: 5px;
    }


    .contact-form-wrapper::-webkit-scrollbar-track {
        background: transparent;
    }


    .contact-form-wrapper::-webkit-scrollbar-thumb {
        background: #CBDDE6;

        border-radius: 20px;
    }



    /* =====================================================
       FORM
    ===================================================== */

    .contact-form {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }



    /* =====================================================
       FORM FIELD
    ===================================================== */

    .form-field {
        position: relative;
    }


    .form-label {
        display: flex;

        align-items: center;

        gap: 3px;

        margin-bottom: 4px;

        color: #333333;

        font-size: 10px;

        font-weight: 700;
    }


    .required {
        color: #0784BE;
    }



    /* =====================================================
       INPUT BOX
    ===================================================== */

    .input-box {
        position: relative;
    }



    /* =====================================================
       INPUT ICON
    ===================================================== */

    .input-icon {
        position: absolute;

        left: 12px;

        top: 50%;

        width: 15px;

        height: 15px;

        color: #8B9AA2;

        transform:
            translateY(-50%);

        pointer-events: none;

        transition:
            color .25s ease,

            transform .25s ease;
    }


    .form-field:focus-within
    .input-icon {
        color: #0784BE;

        transform:
            translateY(-50%)
            scale(1.06);
    }



    /* =====================================================
       TEXTAREA ICON
    ===================================================== */

    .textarea-icon {
        position: absolute;

        left: 12px;

        top: 12px;

        width: 15px;

        height: 15px;

        color: #8B9AA2;

        pointer-events: none;

        transition:
            color .25s ease;
    }


    .form-field:focus-within
    .textarea-icon {
        color: #0784BE;
    }



    /* =====================================================
       INPUTS
    ===================================================== */

    .form-input,
    .form-textarea {
        width: 100%;

        border:
            1px solid
            #E3E8EC;

        border-radius: 8px;

        outline: none;

        background: #F8FAFB;

        color: #1B1B1B;

        font-family: inherit;

        font-size: 13px;

        transition:
            border-color .25s ease,

            background-color .25s ease,

            box-shadow .25s ease,

            transform .25s ease;
    }


    .form-input {
        height: 42px;

        padding:
            0
            12px
            0
            38px;
    }


    .form-textarea {
        min-height: 78px;

        padding:
            10px
            12px
            10px
            38px;

        resize: vertical;

        line-height: 1.55;
    }


    .form-input::placeholder,
    .form-textarea::placeholder {
        color: #A2ADB3;
    }


    .form-input:hover,
    .form-textarea:hover {
        border-color: #BCD0DA;

        background: #ffffff;
    }


    .form-input:focus,
    .form-textarea:focus {
        border-color: #0784BE;

        background: #ffffff;

        box-shadow:
            0 0 0 3px
            rgba(7, 132, 190, .08);

        transform:
            translateY(-1px);
    }


    /* =====================================================
       FIELD ERROR TEXT
    ===================================================== */

    .field-error {
        display: block;

        margin-top: 4px;

        color: #D93025;

        font-size: 11px;
    }



    /* =====================================================
       SUBMIT BUTTON
    ===================================================== */

    .submit-button {
        position: relative;

        width: 100%;

        height: 45px;

        margin-top: 2px;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 10px;

        overflow: hidden;

        border: 0;

        border-radius: 8px;

        background: #0784BE;

        color: #ffffff;

        font-family: inherit;

        font-size: 13px;

        font-weight: 700;

        cursor: pointer;

        transition:
            transform .3s
            cubic-bezier(.22, 1, .36, 1),

            background-color .3s ease,

            box-shadow .3s ease;
    }


    .submit-button:disabled {
        opacity: .7;

        cursor: not-allowed;
    }


    .submit-button::before {
        content: "";

        position: absolute;

        inset: 0;

        background:
            linear-gradient(
                110deg,
                transparent 20%,
                rgba(255,255,255,.18) 50%,
                transparent 80%
            );

        transform:
            translateX(-120%);

        transition:
            transform .7s ease;
    }


    .submit-button:hover::before {
        transform:
            translateX(120%);
    }


    .submit-button:hover {
        background: #075B86;

        transform:
            translateY(-2px);

        box-shadow:
            0 9px 25px
            rgba(7,132,190,.20);
    }


    .submit-button:active {
        transform:
            translateY(0)
            scale(.99);
    }


    .submit-button svg {
        position: relative;

        width: 18px;

        height: 18px;
    }


    .submit-button span {
        position: relative;
    }



    /* =====================================================
       SUCCESS MESSAGE
    ===================================================== */

    .success-message {
        display: none;

        padding:
            35px
            20px;

        text-align: center;
    }


    .success-message.active {
        display: block;

        animation:
            successIn .45s ease forwards;
    }


    @keyframes successIn {
        from {
            opacity: 0;

            transform:
                translateY(10px);
        }

        to {
            opacity: 1;

            transform:
                translateY(0);
        }
    }


    .success-icon {
        width: 55px;

        height: 55px;

        margin:
            0 auto 15px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 50%;

        background: #EAF6FC;

        color: #0784BE;
    }


    .success-icon svg {
        width: 25px;

        height: 25px;
    }


    .success-message h3 {
        margin:
            0 0 7px;

        color: #1B1B1B;

        font-size: 20px;
    }


    .success-message p {
        margin: 0;

        color: #6B7280;

        font-size: 12px;

        line-height: 1.6;
    }


    /* =====================================================
       ERROR MESSAGE (server / network failure)
    ===================================================== */

    .form-error-banner {
        display: none;

        margin-bottom: 10px;

        padding: 10px 12px;

        border-radius: 8px;

        background: #FDECEC;

        color: #B3261E;

        font-size: 12px;

        line-height: 1.5;
    }


    .form-error-banner.active {
        display: block;
    }



    /* =====================================================
       TABLET
    ===================================================== */

    @media (max-width: 900px) {

        .contact-panel {
            right: 60px;

            width:
                min(
                    350px,
                    calc(100vw - 80px)
                );
        }
    }



    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 600px) {

        .contact-trigger {
            top: 50%;

            right: 0;

            width: 48px;

            height: 135px;

            border-radius:
                7px
                0
                0
                7px;
        }


        .contact-trigger:hover {
            transform:
                translateY(-50%)
                translateX(-3px);
        }


        .contact-trigger span {
            font-size: 13px;
        }


        .contact-panel {
            top: 50%;

            right: 58px;

            bottom: auto;

            width:
                min(
                    320px,
                    calc(100vw - 70px)
                );

            max-height:
                calc(100vh - 24px);

            border-radius: 12px;

            transform:
                translate(
                    15px,
                    -50%
                )
                scale(.96);
        }


        .contact-panel.active {
            transform:
                translate(
                    0,
                    -50%
                )
                scale(1);
        }


        .contact-header {
            min-height: 48px;

            padding:
                11px
                12px
                5px;
        }


        .contact-title {
            font-size: 17px;
        }


        .contact-close {
            top: 9px;

            right: 10px;

            width: 28px;

            height: 28px;
        }


        .contact-form-wrapper {
            padding:
                3px
                12px
                12px;
        }


        .contact-form {
            gap: 9px;
        }


        .form-input {
            height: 40px;
        }


        .form-textarea {
            min-height: 70px;
        }


        .submit-button {
            height: 42px;
        }
    }



    /* =====================================================
       SMALL MOBILE
    ===================================================== */

    @media (max-width: 380px) {

        .contact-trigger {
            width: 45px;

            height: 125px;
        }


        .contact-trigger span {
            font-size: 12px;
        }


        .contact-panel {
            right: 52px;

            width:
                calc(100vw - 62px);
        }
    }



    /* =====================================================
       REDUCED MOTION
    ===================================================== */

    @media (prefers-reduced-motion: reduce) {

        .contact-trigger,
        .contact-panel,
        .contact-close,
        .submit-button,
        .form-input,
        .form-textarea {
            transition: none !important;
        }

        .success-message.active {
            animation: none !important;
        }
    }
</style>


<!-- =====================================================
     FLOATING ENQUIRY BUTTON
===================================================== -->

<button
    class="contact-trigger header-btn1"
    id="contactTrigger"
    type="button"
    aria-label="Open enquiry form"
    aria-controls="contactPanel"
    aria-expanded="false"
>

    <span>
        Enquiry Now
    </span>

</button>



<!-- =====================================================
     TRANSPARENT OVERLAY
===================================================== -->

<div
    class="contact-overlay"
    id="contactOverlay"
    aria-hidden="true"
></div>



<!-- =====================================================
     CONTACT PANEL
===================================================== -->

<aside
    class="contact-panel"
    id="contactPanel"
    aria-hidden="true"
>

    <div class="panel-top-line"></div>


    <!-- =================================================
         HEADER
    ================================================== -->

    <div class="contact-header">

        <h3 class="contact-title">
            Get in Touch
        </h3>


        <button
            class="contact-close"
            id="contactClose"
            type="button"
            aria-label="Close enquiry form"
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
            >

                <path d="M6 6L18 18"/>

                <path d="M18 6L6 18"/>

            </svg>

        </button>

    </div>



    <!-- =================================================
         FORM
    ================================================== -->

    <div class="contact-form-wrapper">

        <div class="form-error-banner" id="formErrorBanner">
            Something went wrong. Please try again.
        </div>

        <form
            class="contact-form"
            id="contactForm"
            method="POST"
            action="{{ route('enquiry.store') }}"
            novalidate
        >
            @csrf
            <input type="text" name="website_url" style="display:none" tabindex="-1" autocomplete="off">

            <!-- NAME -->

            <div class="form-field">

                <label
                    class="form-label"
                    for="contactName"
                >
                    Name <span class="required">*</span>
                </label>


                <div class="input-box">

                    <svg
                        class="input-icon"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle
                            cx="12"
                            cy="8"
                            r="4"
                        />

                        <path
                            d="M4 21c.7-4.2 3.4-6.3 8-6.3s7.3 2.1 8 6.3"
                        />

                    </svg>


                    <input
                        class="form-input"
                        id="contactName"
                        name="name"
                        type="text"
                        placeholder="Enter your full name"
                        autocomplete="name"
                    >

                </div>

                <span class="field-error" id="contactName-error"></span>

            </div>



            <!-- NUMBER -->

            <div class="form-field">

                <label
                    class="form-label"
                    for="contactNumber"
                >
                    Number <span class="required">*</span>
                </label>


                <div class="input-box">

                    <svg
                        class="input-icon"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path
                            d="M6.6 3h3.1l1.5 4-2.1 1.7a15.7 15.7 0 0 0 6.2 6.2l1.7-2.1 4 1.5v3.1c0 1.1-.9 2-2 2C11.3 19.4 4.6 12.7 4.6 5c0-1.1.9-2 2-2Z"
                        />

                    </svg>


                    <input
                        class="form-input"
                        id="contactNumber"
                        name="phone"
                        type="tel"
                        placeholder="Enter your phone number"
                        autocomplete="tel"
                        inputmode="tel"
                        maxlength="15"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                    >

                </div>

                <span class="field-error" id="contactNumber-error"></span>

            </div>



            <!-- EMAIL -->

            <div class="form-field">

                <label
                    class="form-label"
                    for="contactEmail"
                >
                    Email <span class="required">*</span>
                </label>


                <div class="input-box">

                    <svg
                        class="input-icon"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <rect
                            x="3"
                            y="5"
                            width="18"
                            height="14"
                            rx="2"
                        />

                        <path
                            d="M4 7l8 6 8-6"
                        />

                    </svg>


                    <input
                        class="form-input"
                        id="contactEmail"
                        name="email"
                        type="email"
                        placeholder="Enter your email address"
                        autocomplete="email"
                    >

                </div>

                <span class="field-error" id="contactEmail-error"></span>

            </div>



            <!-- ADDITIONAL DETAILS -->

            <div class="form-field">

                <label
                    class="form-label"
                    for="contactDetails"
                >
                    Additional Details
                </label>


                <div class="input-box">

                    <svg
                        class="textarea-icon"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M4 5h16"/>

                        <path d="M4 10h16"/>

                        <path d="M4 15h10"/>

                        <path d="M4 20h7"/>

                    </svg>


                    <textarea
                        class="form-textarea"
                        id="contactDetails"
                        name="details"
                        placeholder="Tell us about your requirement..."
                    ></textarea>

                </div>

            </div>



            <!-- SUBMIT -->

            <button
                type="submit"
                class="submit-button"
                id="contactSubmitBtn"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M22 2L11 13"/>

                    <path
                        d="M22 2L15 22L11 13L2 9L22 2Z"
                    />

                </svg>


                <span id="contactSubmitBtnText">
                    Send Enquiry
                </span>

            </button>

        </form>



        <!-- =================================================
             SUCCESS MESSAGE
        ================================================== -->

        <div
            class="success-message"
            id="successMessage"
        >

            <div class="success-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path
                        d="M5 12L9 16L19 6"
                    />

                </svg>

            </div>


            <h3>
                Thank You!
            </h3>


            <p>
                Your enquiry has been received successfully.
                Our team will get back to you shortly.
            </p>

        </div>

    </div>

</aside>



<script>

    /* =====================================================
       ELEMENTS
    ===================================================== */

    const contactTrigger =
        document.getElementById(
            "contactTrigger"
        );

    const contactPanel =
        document.getElementById(
            "contactPanel"
        );

    const contactOverlay =
        document.getElementById(
            "contactOverlay"
        );

    const contactClose =
        document.getElementById(
            "contactClose"
        );

    const contactForm =
        document.getElementById(
            "contactForm"
        );

    const successMessage =
        document.getElementById(
            "successMessage"
        );

    const submitBtn =
        document.getElementById(
            "contactSubmitBtn"
        );

    const submitBtnText =
        document.getElementById(
            "contactSubmitBtnText"
        );

    const errorBanner =
        document.getElementById(
            "formErrorBanner"
        );



    /* =====================================================
       OPEN PANEL
    ===================================================== */

    function openContactPanel() {

        contactPanel.classList.add(
            "active"
        );

        contactOverlay.classList.add(
            "active"
        );


        contactPanel.setAttribute(
            "aria-hidden",
            "false"
        );


        contactOverlay.setAttribute(
            "aria-hidden",
            "false"
        );


        contactTrigger.setAttribute(
            "aria-expanded",
            "true"
        );


        /*
         * IMPORTANT:
         * Do NOT change body overflow.
         * This keeps the existing homepage exactly as it is.
         */

    }



    /* =====================================================
       CLOSE PANEL
    ===================================================== */

    function closeContactPanel() {

        contactPanel.classList.remove(
            "active"
        );

        contactOverlay.classList.remove(
            "active"
        );


        contactPanel.setAttribute(
            "aria-hidden",
            "true"
        );


        contactOverlay.setAttribute(
            "aria-hidden",
            "true"
        );


        contactTrigger.setAttribute(
            "aria-expanded",
            "false"
        );

    }



    /* =====================================================
       OPEN
    ===================================================== */

    contactTrigger.addEventListener(
        "click",
        openContactPanel
    );



    /* =====================================================
       CLOSE
    ===================================================== */

    contactClose.addEventListener(
        "click",
        closeContactPanel
    );



    /* =====================================================
       ESC KEY
    ===================================================== */

    document.addEventListener(
        "keydown",
        function(event) {

            if (
                event.key === "Escape" &&
                contactPanel.classList.contains(
                    "active"
                )
            ) {

                closeContactPanel();

            }

        }
    );



    /* =====================================================
       CLEAR FIELD ERRORS ON INPUT
    ===================================================== */

    ["contactName", "contactNumber", "contactEmail"].forEach(function (id) {
        const el = document.getElementById(id);
        el.addEventListener("input", function () {
            const errEl = document.getElementById(id + "-error");
            if (errEl) errEl.textContent = "";
        });
    });



    /* =====================================================
       FORM SUBMIT — REAL AJAX SUBMISSION TO LARAVEL BACKEND
    ===================================================== */

    contactForm.addEventListener(
        "submit",
        function(event) {

            event.preventDefault();

            errorBanner.classList.remove("active");

            // Basic client-side required check
            const name = document.getElementById("contactName").value.trim();
            const phone = document.getElementById("contactNumber").value.trim();
            const email = document.getElementById("contactEmail").value.trim();

            let hasError = false;

            if (!name) {
                document.getElementById("contactName-error").textContent = "Please enter your name.";
                hasError = true;
            }
            if (!phone) {
                document.getElementById("contactNumber-error").textContent = "Please enter your phone number.";
                hasError = true;
            }
            if (!email) {
                document.getElementById("contactEmail-error").textContent = "Please enter your email.";
                hasError = true;
            }

            if (hasError) return;

            const formData = new FormData(contactForm);

            submitBtn.disabled = true;
            submitBtnText.textContent = "Submitting...";

            fetch(contactForm.action, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Accept": "application/json",
                },
                body: formData,
            })
            .then(function (response) {
                return response.json().then(function (data) {
                    return { status: response.status, body: data };
                });
            })
            .then(function (result) {

                if (result.status === 200 && result.body.success) {

                    // Redirect to Thank You page
                    window.location.href = "{{ route('thankyou') }}";

                } else if (result.status === 422 && result.body.errors) {

                    submitBtn.disabled = false;
                    submitBtnText.textContent = "Send Enquiry";

                    // Laravel validation errors
                    const errors = result.body.errors;
                    const fieldMap = {
                        name: "contactName-error",
                        phone: "contactNumber-error",
                        email: "contactEmail-error",
                    };

                    Object.keys(errors).forEach(function (field) {
                        const errEl = document.getElementById(fieldMap[field]);
                        if (errEl) errEl.textContent = errors[field][0];
                    });

                } else {
                    submitBtn.disabled = false;
                    submitBtnText.textContent = "Send Enquiry";
                    errorBanner.classList.add("active");
                }
            })
            .catch(function () {
                submitBtn.disabled = false;
                submitBtnText.textContent = "Send Enquiry";
                errorBanner.classList.add("active");
            });

        }
    );

</script>
