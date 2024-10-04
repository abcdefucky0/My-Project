const toggleSearch = (search, button) =>{
    const searchBar = document.getElementById(search),
    searchButtton = document.getElementById(button)

    searchButtton.addEventListener('click', () =>{
        searchBar.classList.toggle('show-search')
    })
}

toggleSearch('search-bar', 'search-button') 

// Tambahkan ini ke search.js Anda
document.addEventListener('DOMContentLoaded', (click) => {
    const serviceBoxes = document.querySelectorAll('.services-box');
    
    serviceBoxes.forEach(box => {
        box.addEventListener('click', (event) => {
            event.stopPropagation(); // Menghentikan event bubbling
            const dropdown = box.querySelector('.dropdown-content');
            if (dropdown) {
                dropdown.classList.toggle('show');
            }
        });
    });

    // Menambahkan event listener untuk menutup dropdown ketika klik di luar kotak
    window.addEventListener('click', (event) => {
        if (!event.target.closest('.services-box')) {
            const dropdowns = document.querySelectorAll('.dropdown-content');
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const serviceBoxes = document.querySelectorAll('.services-box');
    const editFormContainer = document.getElementById('editFormContainer');
    const editForm = document.getElementById('editForm');
    const editName = document.getElementById('editName');
    const editGen = document.getElementById('editGen');
    const editJiko = document.getElementById('editJiko');
    const editImage = document.getElementById('editImage');
    const editIndex = document.getElementById('editIndex');

    serviceBoxes.forEach((box, index) => {
        const editButton = box.querySelector('.dropdown-content a:nth-child(1)');
        editButton.addEventListener('click', (event) => {
            event.stopPropagation();
            event.preventDefault();

            const name = box.querySelector('h3').textContent;
            const jiko = box.querySelector('p:nth-child(3)').textContent;
            const gen = box.querySelector('p:nth-child(4)').textContent.split(' ')[1];

            editName.value = name;
            editGen.value = gen;
            editJiko.value = jiko;
            editIndex.value = index;

            editFormContainer.style.display = 'block';
            window.scrollTo(0, document.body.scrollHeight);
        });
    });

    editForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const index = editIndex.value;
        const box = serviceBoxes[index];
        const name = editName.value;
        const gen = editGen.value;
        const jiko = editJiko.value;

        box.querySelector('h3').textContent = name;
        box.querySelector('p:nth-child(3)').textContent = jiko;
        box.querySelector('p:nth-child(4)').textContent = `Gen ${gen}`;

        // Handle image change if necessary
        const file = editImage.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                box.querySelector('img').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        editFormContainer.style.display = 'none';
    });
});



// Ambil form pencarian
const searchForm = document.getElementById('search-bar');
// Ambil div untuk menampilkan hasil pencarian
const searchResults = document.getElementById('search-results');

// Tambahkan event listener untuk submit form
searchForm.addEventListener('submit', async (e) => {
    e.preventDefault(); // Mencegah form submit default

    const formData = new FormData(searchForm); // Ambil data dari form
    const searchParams = new URLSearchParams(formData); // Ubah menjadi URLSearchParams

    try {
        const response = await fetch('search.php', {
            method: 'POST',
            body: searchParams
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.text(); // Ambil response dari server
        searchResults.innerHTML = data; // Tampilkan data di div hasil pencarian

    } catch (error) {
        console.error('Error:', error);
    }
});




