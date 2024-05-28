document.addEventListener("DOMContentLoaded", function() {
    const acc = document.getElementsByClassName("accordion");
    for (let i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            const panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
});

function filterRows(gender) {
    const table = document.getElementById('genderTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        const cells = rows[i].getElementsByTagName('td');
        if (cells.length > 0) {
            const genderCell = cells[1].textContent.toLowerCase();
            if (gender === 'all') {
                rows[i].style.display = '';
            } else if (genderCell === gender) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
}

function sortTable(order) {
    const table = document.getElementById('genderTable').getElementsByTagName('tbody')[0];
    const rows = Array.from(table.getElementsByTagName('tr'));
    const sortedRows = rows.sort((a, b) => {
        const ageA = parseInt(a.getElementsByTagName('td')[2].textContent);
        const ageB = parseInt(b.getElementsByTagName('td')[2].textContent);
        return order === 'asc' ? ageA - ageB : ageB - ageA;
    });

    while (table.firstChild) {
        table.removeChild(table.firstChild);
    }

    sortedRows.forEach(row => table.appendChild(row));
}
