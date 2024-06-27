import './bootstrap';

import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

import './../../vendor/power-components/livewire-powergrid/dist/tailwind.css'
document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.querySelector('[aria-label="Open Menu"]');
    const closeButton = document.querySelector('[aria-label="Close Menu"]');
    const dropdownMenu = document.getElementById('mobile-menu-dropdown');

    // Function to toggle the dropdown menu
    function toggleDropdown() {
        dropdownMenu.classList.toggle('hidden');
    }

    // Event listener for the "Open Menu" button
    menuButton.addEventListener('click', toggleDropdown);

    // Event listener for the "Close Menu" button
    closeButton.addEventListener('click', toggleDropdown);
});

const typedText = document.getElementById('typed-text');
const cursor = document.getElementById('cursor');
const terminalOutput = document.getElementById('terminal-output');

const commands = [
    " echo 'nameserver 8.8.8.8' | sudo tee -a /etc/resolv.conf",
    " echo 'nameserver 8.8.4.4' | sudo tee -a /etc/resolv.conf",
    " sudo systemctl restart network",
    " nslookup example.com",
    " ping example.com "
];

let commandIndex = 0;
let charIndex = 0;
let isDeleting = false;

function type() {
    const currentCommand = commands[commandIndex];

    if (isDeleting) {
        typedText.textContent = currentCommand.substring(0, charIndex);
        charIndex--;
        if (charIndex === 0) {
            isDeleting = false;
            commandIndex = (commandIndex + 1) % commands.length;
            typedText.textContent = "";
        }
    } else {
        typedText.textContent += currentCommand.charAt(charIndex);
        charIndex++;
        if (charIndex === currentCommand.length) {
            // Start the deletion process after a delay
            setTimeout(() => {
                isDeleting = true;
                typedText.textContent = "";
            }, 2000); // Delay before starting deletion
        }
    }

    setTimeout(type, isDeleting ? 50 : 100);
}

type();






