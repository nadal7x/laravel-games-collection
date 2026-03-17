const langSelect = document.querySelector('.lang-select-container select');

if (langSelect) {

  langSelect.addEventListener('change', async () => {

    const formData = new FormData();
    formData.append('lang', langSelect.value);
    formData.append('path', window.location.href);

    const response = await fetch('/change-lang', {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: formData
    })
    if (!response.ok) {
      throw response;
    }
    const data = await response.json();
    window.location.replace(data.route);
  });

};


