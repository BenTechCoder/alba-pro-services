export default async function shareBtn(btn) {
    if(!btn) {
        return;
    }
    const url = btn.getAttribute('data-link');
  const title = 'Check out Alba Pro Services for your exterior cleaning needs!';
  if (navigator.share) {
    navigator.share({ title, url })
      .then(() => console.log('Content shared successfully!'))
      .catch((error) => console.error('Error sharing:', error));
  } else {
    try {
    await navigator.clipboard.writeText(url);
    btn.textContent = "Link Copied!"
  } catch (error) {
    console.error(error.message);
  }
  }
}	