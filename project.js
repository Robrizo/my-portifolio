// Function to handle the search functionality
function searchProjects() {
  const searchInput = document.getElementById('search-project');
  const filterSelect = document.getElementById('filter');
  const articles = document.getElementsByClassName('featured_projects');

  const searchTerm = searchInput.value.toLowerCase();
  const selectedFilter = filterSelect.value.toLowerCase();

  for (let i = 0; i < articles.length; i++) {
    const article = articles[i];
    const projectTitle = article.querySelector('.image-text h3').innerText.toLowerCase();

    // Check if the project title matches the search term and filter
    if (
      (projectTitle.includes(searchTerm) || searchTerm === '') &&
      (selectedFilter === 'all' || projectTitle.includes(selectedFilter))
    ) {
      article.style.display = 'block';
    } else {
      article.style.display = 'none';
    }
  }
}

// Add event listeners to the search input and filter select
document.getElementById('search-project').addEventListener('input', searchProjects);
document.getElementById('filter').addEventListener('change', searchProjects);