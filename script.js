document.addEventListener("DOMContentLoaded", function() {
    var registrationTab = document.getElementById("registration-tab");
    var contentContainer = document.querySelector(".content");
  
    registrationTab.addEventListener("click", function() {
      fetchNews();
    });
  
    function fetchNews() {
      var apiKey = "f7d54802ae9d4e2eb6b90d6e456b63ee";
      var url = "https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=" + apiKey;
  
      fetch(url)
        .then(response => response.json())
        .then(data => {
          if (data.articles) {
            var articles = data.articles;
            var newsGrid = document.getElementById("news-grid");
  
            newsGrid.innerHTML = "";
  
            articles.forEach(function(article) {
              var newsItem = document.createElement("div");
              newsItem.classList.add("grid-item");
  
              var newsTitle = document.createElement("h3");
              newsTitle.textContent = article.title;
  
              var newsDescription = document.createElement("p");
              newsDescription.textContent = article.description;
  
              var newsLink = document.createElement("a");
              newsLink.textContent = "Read More";
              newsLink.href = article.url;
              newsLink.target = "_blank";
  
              newsItem.appendChild(newsTitle);
              newsItem.appendChild(newsDescription);
              newsItem.appendChild(newsLink);
  
              newsGrid.appendChild(newsItem);
            });
          }
        })
        .catch(error => {
          console.error("Error fetching news:", error);
        });
    }
  });
  