 <style>
    .loader {
        position: absolute;
        width: 100%;
        height: 100%;
        background: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .lettre {
        color: #484848;
        font-size: 80px;
        letter-spacing: 15px;
        /* margin-bottom: 150px; */
        animation: flash 1.2s linear infinite;
    }

    @keyframes flash {
        0%{
            color: green;
            text-shadow:  0 0 7px green;
        }
        90%{
            color: #484848;
            text-shadow: none;
        }
        100% {
            color: green;
            text-shadow:  0 0 7px green;
        }
    }

    .lettre:nth-child(1){
        animation-delay: 0.1s;
    }
    .lettre:nth-child(2){
        animation-delay: 0.2s;
    }
    .lettre:nth-child(3){
        animation-delay: 0.3s;
    }
    .lettre:nth-child(4){
        animation-delay: 0.4s;
    }
    .lettre:nth-child(5){
        animation-delay: 0.5s;
    }
    .lettre:nth-child(6){
        animation-delay: 0.6s;
    }
    .lettre:nth-child(7){
        animation-delay: 0.7s;
    }
    .lettre:nth-child(8){
        animation-delay: 0.8s;
    }
    .lettre:nth-child(9){
        animation-delay: 0.9s;
    }
    .lettre:nth-child(10){
        animation-delay: 1s;
    }
    .lettre:nth-child(11){
        animation-delay: 1.1s;
    }
    .lettre:nth-child(12){
        animation-delay: 1.2s;
    }
    .lettre:nth-child(13){
        animation-delay: 1.3s;
    }

    .fondu-out{
        opacity: 0;
        transition: opacity 0.4s ease-out;
    }


 </style>

<div class="loader">
<span class="lettre">C</span>
<span class="lettre">H</span>
<span class="lettre">A</span>
<span class="lettre">R</span>
<span class="lettre">G</span>
<span class="lettre">E</span>
<span class="lettre">M</span>
<span class="lettre">E</span>
<span class="lettre">N</span>
<span class="lettre">T</span>
<span class="lettre">.</span>
<span class="lettre">.</span>
<span class="lettre">.</span>
</div>
