document.addEventListener("DOMContentLoaded", function () {
    const modalToggles = document.querySelectorAll("[data-modal-toggle]");
    const modalCloses = document.querySelectorAll("[data-modal-hide]");

    modalToggles.forEach((toggle) => {
        toggle.addEventListener("click", () => {
            const target = toggle.getAttribute("data-modal-target");
            const modal = document.getElementById(target);
            modal.classList.toggle("hidden");
            modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
        });
    });

    modalCloses.forEach((close) => {
        close.addEventListener("click", () => {
            const target = close.getAttribute("data-modal-hide");
            const modal = document.getElementById(target);
            modal.classList.add("hidden");
            modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
        });
    });
});
