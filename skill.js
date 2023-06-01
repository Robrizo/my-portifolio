// Set the progress values (0-100) and text for each skill
    const progressData = {
        'graphic-design-progress': {
            value: 90,
            text: 'Expert'
        },
        'ui-ux-design-progress': {
            value: 70,
            text: 'Advanced'
        },
        'web-dev-progress': {
            value: 85,
            text: 'Advanced'
        },
        'mobile-dev-progress': {
            value: 60,
            text: 'Intermediate'
        },
        'git-proficiency': {
            value: 65,
            text: 'Intermediate'
        }
    };

    // Update the width, percent, and text of each progress bar
    Object.keys(progressData).forEach(skill => {
        const progressElement = document.getElementById(skill);
        const { value, text } = progressData[skill];

        progressElement.style.width = `${value}%`;
        progressElement.querySelector('.progress-percent').textContent = `${value}%`;
        progressElement.querySelector('.progress-text').textContent = text;
    });