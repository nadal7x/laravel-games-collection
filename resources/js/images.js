const imageGalleryContainer = document.querySelector('.images-modal');

if (imageGalleryContainer) {
  let openGalleryElement;
  let imageTitle;
  let imageAlt;
  let imageSrc;
  let galleryTitle = imageGalleryContainer.querySelector('.image-data [name="title"]');
  let galleryAlt = imageGalleryContainer.querySelector('.image-data [name="alt"]');

  document.addEventListener('open-gallery-modal', (event) => {
    imageGalleryContainer.classList.add('active');
    openGalleryElement = event.detail.element;
    imageTitle = openGalleryElement.querySelector('img').getAttribute('title');
    imageAlt = openGalleryElement.querySelector('img').getAttribute('alt');
    imageSrc = openGalleryElement.querySelector('img').getAttribute('src');

    if (imageSrc) {
      galleryTitle.value = imageTitle;
      galleryAlt.value = imageAlt;
      imageGalleryContainer.querySelector(`.image-item img[src="${imageSrc}"]`).parentElement.classList.add('selected');
    } else {
      galleryTitle.value = '';
      galleryAlt.value = '';
      const allImageItems = document.querySelectorAll('.image-item');
      allImageItems.forEach(item => item.classList.remove('selected'));
    }
  })

  imageGalleryContainer?.addEventListener('click', async (event) => {

    if (event.target.closest('.modal-close')) {
      event.preventDefault();
      imageGalleryContainer.classList.remove('active');
    }

    if (event.target.closest('.save-image')) {
      event.preventDefault();
      const imageItem = document.querySelector('.image-item.selected')
      if (imageItem) {
        const multipleImages = openGalleryElement.parentElement.classList.contains('multiple');
        if (multipleImages && openGalleryElement.classList.contains('active')) {
          const newImage = openGalleryElement.cloneNode(true);
          newImage.querySelector('img').src = imageItem.querySelector('img').src;
          newImage.querySelector('img').alt = galleryAlt.value;
          newImage.querySelector('img').title = galleryTitle.value;
          openGalleryElement.parentElement.appendChild(newImage);

        } else {
          openGalleryElement.querySelector('img').src = imageItem.querySelector('img').src;
          openGalleryElement.querySelector('img').alt = galleryAlt.value;
          openGalleryElement.querySelector('img').title = galleryTitle.value;
          if (!openGalleryElement.classList.contains('active')) {
            openGalleryElement.classList.add('active');
          }
        }

      }
      imageGalleryContainer.classList.remove('active');
    }

    if (event.target.closest('.upload-image')) {
      document.querySelector('.upload-image-input').click()
    }

    if (event.target.closest('.image-delete')) {
      const endpoint = event.target.closest('.image-delete').dataset.endpoint

      const result = await fetch(`${endpoint}`, {
        method: 'DELETE',
        headers: {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        }
      })

      const data = await result.json()
      imageGalleryContainer.innerHTML = data.imageGallery
    }

    if (event.target.closest('.image-item')) {
      const imageItem = event.target.closest('.image-item');
      const allImageItems = document.querySelectorAll('.image-item');
      allImageItems.forEach(item => item.classList.remove('selected'));
      imageItem.classList.add('selected')
    }
  })

  document.querySelector('.upload-image-input').addEventListener('change', async (event) => {
    try {
      const endpoint = document.querySelector('.upload-image-input').dataset.endpoint
      const image = event.target.files[0]

      const formData = new FormData()
      formData.append('image', image)

      const result = await fetch(endpoint, {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
      })

      const data = await result.json()
      imageGalleryContainer.innerHTML = data.imageGallery

    } catch (error) {
      console.error(error)
    }
  })
}