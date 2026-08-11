<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
<style>
    #whatsapp-widget-container {
        position: fixed;
          bottom: 20px;
    right: 25px;
        z-index: 999999;
        pointer-events: none; 
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    #chat-box {
        width: 320px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        margin-bottom: 15px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(30px) scale(0.95);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
         position: absolute;
        bottom: 70px;
        right: 0;
    }

    #chat-box.active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0) scale(1);
        pointer-events: auto; 
    }

    .chat-header {
        background: #075e54;
        color: #fff;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
    }

    .chat-form { padding: 20px; background: #f4f4f4; }
    .iti { width: 100% !important; margin-bottom: 12px; }
    #user-phone, #user-message {
        width: 100% !important;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    #user-message { height: 80px; resize: none; margin-top: 10px; }

    .start-btn {
        width: 100%;
        border: none;
        background: #25d366;
        color: #fff;
        padding: 12px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }

    #whatsapp-main-btn {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: #25d366;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        pointer-events: auto;
         animation: pulse 1.5s infinite;
    }
    
    @keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
    }
}

    
    
    
    #whatsapp-main-btn img { width: 32px; height: 32px; }
</style>

<div id="whatsapp-widget-container">
    <div id="chat-box">
        <div class="chat-header">
            <span>Chat with us</span>
            <span style="cursor:pointer; font-size:24px" onclick="toggleWhatsapp()">&times;</span>
        </div>
        <div class="chat-form">
            <form id="whatsappForm">
                @csrf <label style="font-size:12px; display:block; margin-bottom:5px;">Your Mobile Number</label>
                <input type="tel" id="user-phone" name="phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" required placeholder="Enter Your Number">
                
                <textarea id="user-message" name="message" placeholder="Type your message"></textarea>
                
                <button type="submit" class="start-btn" id="submit-btn">Start Chat</button>
            </form>
        </div>
    </div>

    <button id="whatsapp-main-btn" onclick="toggleWhatsapp()">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA">
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    const phoneInput = document.querySelector("#user-phone");
    const iti = window.intlTelInput(phoneInput, {
        preferredCountries: ["in", "ae", "us"],
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    function toggleWhatsapp() {
        document.getElementById("chat-box").classList.toggle("active");
    }

    document.getElementById("whatsappForm").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const btn = document.getElementById("submit-btn");
    btn.innerHTML = "Saving...";
    btn.disabled = true;

    const fullNumber = iti.getNumber();
    const messageText = document.getElementById("user-message").value;

    fetch('/whatsapp-store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json', // Yeh zaroori hai Laravel ke liye
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: JSON.stringify({
            phone: fullNumber,
            message: messageText
        })
    })
    .then(response => response.json()) // Response ko JSON mein convert karein
    // .then(data => {
    //     if(data.success) {
    //         // Success hone par WhatsApp open karein
    //         window.open(data.url, "_blank");
    //         btn.innerHTML = "Start Chat";
    //         btn.disabled = false;
    //         toggleWhatsapp();
    //     } else {
    //         alert("Validation Error: Check phone format");
    //         btn.disabled = false;
    //         btn.innerHTML = "Start Chat";
    //     }
    // })
    
    .then(data => {
    if(data.success) {

        // GTM Event Push
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            event: 'whatsapp_click',
            phone: fullNumber
        });

        // WhatsApp Open
        window.open(data.url, "_blank");

        btn.innerHTML = "Start Chat";
        btn.disabled = false;
        toggleWhatsapp();

    } else {

        alert("Validation Error: Check phone format");

        btn.disabled = false;
        btn.innerHTML = "Start Chat";
    }
})
    
    .catch(error => {
        console.error('Error:', error);
        alert("Something went wrong!");
        btn.disabled = false;
        btn.innerHTML = "Start Chat";
    });
});
</script>