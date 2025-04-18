document.addEventListener('DOMContentLoaded', function() {
    const packages = document.querySelectorAll('.package');
    const targetFollowersInput = document.getElementById('target-followers');
    const currentFollowersElement = document.getElementById('current-followers');
    
    packages.forEach(package => {
        package.addEventListener('click', function() {
            packages.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            const followers = this.getAttribute('data-followers');
            targetFollowersInput.value = followers;
        });
    });
    
    const instagramForm = document.getElementById('instagram-form');
    const progressBox = document.getElementById('progress-box');
    const progressBar = document.getElementById('progress');
    const progressText = document.getElementById('progress-text');
    const followersAdded = document.getElementById('followers-added');
    
    instagramForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const targetFollowers = targetFollowersInput.value || 1000;
        
        if (!username || !password) {
            alert('Please enter both Instagram username and password');
            return;
        }
        
        progressBox.classList.remove('hidden');
        
        let currentFollowers = 1250;
        let addedFollowers = 0;
        const target = parseInt(targetFollowers);
        
        const interval = setInterval(() => {
            if (addedFollowers >= target) {
                clearInterval(interval);
                const totalFollowers = currentFollowers + addedFollowers;
                currentFollowersElement.textContent = totalFollowers.toLocaleString();
                setTimeout(() => {
                    if (target === 1000) {
                        alert('Congratulations! You got 1000 free followers!');
                    } else {
                        alert(`Success! ${target.toLocaleString()} followers added to your account!`);
                    }
                }, 500);
                return;
            }
            
            const increment = target === 1000 ? 
                Math.floor(Math.random() * 50) + 10 : 
                Math.floor(Math.random() * 10) + 1;
                
            addedFollowers += increment;
            if (addedFollowers > target) addedFollowers = target;
            
            const percentage = Math.floor((addedFollowers / target) * 100);
            
            progressBar.style.width = `${percentage}%`;
            progressText.textContent = `${percentage}% Complete`;
            followersAdded.textContent = `${addedFollowers.toLocaleString()} followers added`;
            
        }, 100);
        
        console.log('Submitted:', { username, password, targetFollowers });
    });
    
    targetFollowersInput.addEventListener('change', function() {
        let value = parseInt(this.value);
        if (isNaN(value)) value = 1000;
        if (value < 100) value = 100;
        if (value > 100000) value = 100000;
        this.value = value;
    });
    
    const freePackage = document.querySelector('.free-package');
    if (freePackage) {
        freePackage.click();
    }
});
