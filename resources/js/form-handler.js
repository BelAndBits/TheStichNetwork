document.addEventListener('DOMContentLoaded', function() {
    // Define the function 'updateMainImageOptions' on the global 'window' object to ensure it is accessible globally.
    window.updateMainImageOptions = function(input) {
        const numberOfFiles = input.files.length;  // Get the number of files uploaded through the input.
        const container = document.getElementById('main-image-selection');  // Get the container where radio buttons will be displayed.
        container.innerHTML = ''; // Clear any previously displayed options in the container.

        // If there are one or more files uploaded, process them.
        if (numberOfFiles > 0) {
            container.classList.remove('hidden'); // Make the container visible.
            for (let i = 0; i < numberOfFiles; i++) {  // Loop through all uploaded files.
                const radioWrapper = document.createElement('div');  // Create a new DIV to hold each radio button and its label.
                radioWrapper.className = 'flex items-center mb-2';  // Add classes for styling.

                const radioInput = document.createElement('input');  // Create the radio button.
                radioInput.type = 'radio';
                radioInput.id = `main_image_${i}`;  // Assign an unique ID based on the file index.
                radioInput.name = 'main_image';  // All radio buttons share the same name to group them.
                radioInput.value = i;  // The value of each radio button corresponds to its index.
                radioInput.className = 'mr-2';  // Add margin class for spacing.
                if (i === 0) {
                    radioInput.checked = true;  // Automatically check the first radio button.
                }

                const label = document.createElement('label');  // Create a label for the radio button.
                label.htmlFor = `main_image_${i}`;  // Ensure the label corresponds to the radio button ID.
                label.className = 'text-sm text-gray-700';  // Add classes for styling.
                label.textContent = `Image ${i + 1}`;  // Set label text to show which image it represents.

                radioWrapper.appendChild(radioInput);  // Add the radio button to the wrapper.
                radioWrapper.appendChild(label);  // Add the label to the wrapper.
                container.appendChild(radioWrapper);  // Add the wrapper to the container.
            }
        } else {
            container.classList.add('hidden'); // Hide the container if no files are selected.
        }
    };
});