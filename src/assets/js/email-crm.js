
document.getElementById('xlsx-excel').addEventListener('change', function(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();

    reader.onload = function(e) {
      const data = new Uint8Array(e.target.result);
      const workbook = XLSX.read(data, { type: 'array' });
      
      let emails = [];

      workbook.SheetNames.forEach(sheetName => {
        const worksheet = workbook.Sheets[sheetName];
        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

        jsonData.forEach(row => {
          row.forEach(cell => {
            if (typeof cell === 'string' && cell.includes('@')) {
              emails.push(cell.trim());
            }
          });
        });
      });

      document.getElementById('emails').value = emails.join(', ');
    };

    reader.readAsArrayBuffer(file);
  }
});



