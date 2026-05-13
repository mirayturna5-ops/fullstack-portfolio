// DARK MODE
const themeBtn = document.getElementById("themeBtn");
if (localStorage.getItem("theme") === "dark") {
  document.body.classList.add("dark");
}
if (themeBtn) {
  themeBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark");
    localStorage.setItem("theme", document.body.classList.contains("dark") ? "dark" : "light");
  });
}


// SCROLL PROGRESS
window.addEventListener("scroll", () => {
  const el = document.getElementById("progress");
  if (!el) return;
  const scrolled = (document.documentElement.scrollTop / (document.documentElement.scrollHeight - document.documentElement.clientHeight)) * 100;
  el.style.width = scrolled + "%";
});

// REVEAL ON SCROLL
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) e.target.classList.add("active"); });
}, { threshold: 0.1 });

document.querySelectorAll(".skill-block, .project-item, .about-right, .contact-form").forEach(el => {
  el.classList.add("reveal");
  observer.observe(el);
});

// CONTACT FORM
const form = document.getElementById("contactForm");
if (form) {
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();
    const formMessage = document.getElementById("formMessage");

    if (!name || !email || !message) {
      formMessage.innerText = "Please fill all fields.";
      return;
    }

    try {
      const res = await fetch("contact.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&message=${encodeURIComponent(message)}`
      });
      formMessage.innerText = await res.text();
      form.reset();
    } catch {
      formMessage.innerText = "Something went wrong. Try again.";
    }
  });
}

async function loadProjects() {
  try {
    const res = await fetch("get_projects.php");
    const data = await res.json();

    const container = document.getElementById("projectsList");
    container.innerHTML = "";

    if (data.length === 0) {
      container.innerHTML = "<p>No projects yet.</p>";
      return;
    }

    data.forEach((p, i) => {
      container.innerHTML += `
        <div class="project-item">
          <span class="project-num">${String(i+1).padStart(2,'0')}</span>

          <div class="project-info">
            <h3>${p.title}</h3>
            <p>${p.description}</p>
          </div>

          <span class="project-tag">Web</span>
        </div>
      `;
    });

  } catch (err) {
    console.log("Project load error:", err);
  }
}

loadProjects();

// SKILL BAR ANIMATION
const barObserver = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.querySelectorAll('.sbar-fill').forEach(bar => {
        bar.classList.add('animated');
      });
    }
  });
}, { threshold: 0.3 });

document.querySelectorAll('.skill-card').forEach(card => barObserver.observe(card));