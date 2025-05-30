// simpel fade in animasi
document.addEventListener('DOMContentLoaded', () => {
  const items = document.querySelectorAll('.note-list li');
  items.forEach((li, i) => {
    li.style.animationDelay = `${i * 0.1 + 0.1}s`;
  });
});

// animasi tombol
document.querySelectorAll('form button').forEach(btn => {
  btn.addEventListener('mousedown', () => {
    btn.style.transform = 'scale(0.95)';
  });
  btn.addEventListener('mouseup', () => {
    btn.style.transform = '';
  });
});

//Tanggalan
const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
const daysOfWeek = ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"];

let currentDate = new Date();

function renderCalendar() {
  const month = currentDate.getMonth();
  const year = currentDate.getFullYear();
  
  // Tampilkan bulan dan tahun
  document.getElementById("monthYear").innerText = `${monthNames[month]} ${year}`;
  
  // Menghitung hari pertama bulan ini dan jumlah hari dalam bulan
  const firstDay = new Date(year, month, 1).getDay();
  const lastDate = new Date(year, month + 1, 0).getDate();
  
  const calendarDays = document.getElementById("calendarDays");
  calendarDays.innerHTML = "";
  
  // Menambahkan nama hari
  for (let day of daysOfWeek) {
    const dayName = document.createElement("div");
    dayName.innerText = day;
    calendarDays.appendChild(dayName);
  }
  
  // Menambahkan hari kosong sebelum tanggal pertama bulan ini
  for (let i = 0; i < firstDay; i++) {
    const emptyDay = document.createElement("div");
    calendarDays.appendChild(emptyDay);
  }
  
  // Menambahkan tanggal-tanggal bulan ini
  for (let day = 1; day <= lastDate; day++) {
    const dayElement = document.createElement("div");
    dayElement.innerText = day;
    
    // Menandai hari ini
    if (day === currentDate.getDate()) {
      dayElement.classList.add("current-day");
    }
    
    calendarDays.appendChild(dayElement);
  }
}

document.getElementById("prevMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
});

document.getElementById("nextMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar();
});

// Initial render
renderCalendar();

// Fungsi untuk mengirimkan pilihan penyortiran ke backend
    function sortNotes() {
      var sortValue = document.getElementById("sortSelect").value;
      var [sortBy, sortOrder] = sortValue.split('|');

      // Mengarahkan ulang halaman dengan parameter penyortiran
      window.location.href = `index.php?sort_by=${sortBy}&sort_order=${sortOrder}`;
    }