import { activateEl, addListener } from "../utils/functions";

const videoCovers = document.querySelectorAll(".video-cover");
const videoSrc = document.querySelectorAll(".video");

if (videoCovers) {
  videoCovers.forEach((videoCover) => {
    addListener(videoCover, "click", (e) => {
      const cover = videoCover;

      videoSrc.forEach((videoPlay) => {
        if (videoPlay === videoSrc) return;
        videoPlay.play();
      });

      cover.classList.add("without-cover");
    });
  });
}
