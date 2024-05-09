
function locomotive() {
  gsap.registerPlugin(ScrollTrigger);

  const locoScroll = new LocomotiveScroll({
    el: document.querySelector("#main"),
    smooth: true ,
  });
  locoScroll.on("scroll", ScrollTrigger.update);

  ScrollTrigger.scrollerProxy("#main", {
    scrollTop(value) {
      return arguments.length
        ? locoScroll.scrollTo(value, 0, 0)
        : locoScroll.scroll.instance.scroll.y;
    },

    getBoundingClientRect() {
      return {
        top: 0,
        left: 0,
        width: window.innerWidth,
        height: window.innerHeight,
      };
    },

    pinType: document.querySelector("#main").style.transform
      ? "transform"
      : "fixed",
  });
  ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
  ScrollTrigger.refresh();
}
locomotive();


const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


window.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  render();
});

function files(index) {
  var data = `
     ./IMGS/male0001.png
     ./IMGS/male0002.png
     ./IMGS/male0003.png
     ./IMGS/male0004.png
     ./IMGS/male0005.png
     ./IMGS/male0006.png
     ./IMGS/male0007.png
     ./IMGS/male0008.png
     ./IMGS/male0009.png
     ./IMGS/male0010.png
     ./IMGS/male0011.png
     ./IMGS/male0012.png
     ./IMGS/male0013.png
     ./IMGS/male0014.png
     ./IMGS/male0015.png
     ./IMGS/male0016.png
     ./IMGS/male0017.png
     ./IMGS/male0018.png
     ./IMGS/male0019.png
     ./IMGS/male0020.png
     ./IMGS/male0021.png
     ./IMGS/male0022.png
     ./IMGS/male0023.png
     ./IMGS/male0024.png
     ./IMGS/male0025.png
     ./IMGS/male0026.png
     ./IMGS/male0027.png
     ./IMGS/male0028.png
     ./IMGS/male0029.png
     ./IMGS/male0030.png
     ./IMGS/male0031.png
     ./IMGS/male0032.png
     ./IMGS/male0033.png
     ./IMGS/male0034.png
     ./IMGS/male0035.png
     ./IMGS/male0036.png
     ./IMGS/male0037.png
     ./IMGS/male0038.png
     ./IMGS/male0039.png
     ./IMGS/male0040.png
     ./IMGS/male0041.png
     ./IMGS/male0042.png
     ./IMGS/male0043.png
     ./IMGS/male0044.png
     ./IMGS/male0045.png
     ./IMGS/male0046.png
     ./IMGS/male0047.png
     ./IMGS/male0048.png
     ./IMGS/male0049.png
     ./IMGS/male0050.png
     ./IMGS/male0051.png
     ./IMGS/male0052.png
     ./IMGS/male0053.png
     ./IMGS/male0054.png
     ./IMGS/male0055.png
     ./IMGS/male0056.png
     ./IMGS/male0057.png
     ./IMGS/male0058.png
     ./IMGS/male0059.png
     ./IMGS/male0060.png
     ./IMGS/male0061.png
     ./IMGS/male0062.png
     ./IMGS/male0063.png
     ./IMGS/male0064.png
     ./IMGS/male0065.png
     ./IMGS/male0066.png
     ./IMGS/male0067.png
     ./IMGS/male0068.png
     ./IMGS/male0069.png
     ./IMGS/male0070.png
     ./IMGS/male0071.png
     ./IMGS/male0072.png
     ./IMGS/male0073.png
     ./IMGS/male0074.png
     ./IMGS/male0075.png
     ./IMGS/male0076.png
     ./IMGS/male0077.png
     ./IMGS/male0078.png
     ./IMGS/male0079.png
     ./IMGS/male0080.png
     ./IMGS/male0081.png
     ./IMGS/male0082.png
     ./IMGS/male0083.png
     ./IMGS/male0084.png
     ./IMGS/male0085.png
     ./IMGS/male0086.png
     ./IMGS/male0087.png
     ./IMGS/male0088.png
     ./IMGS/male0089.png
     ./IMGS/male0090.png
     ./IMGS/male0091.png
     ./IMGS/male0092.png
     ./IMGS/male0093.png
     ./IMGS/male0094.png
     ./IMGS/male0095.png
     ./IMGS/male0096.png
     ./IMGS/male0097.png
     ./IMGS/male0098.png
     ./IMGS/male0099.png
     ./IMGS/male0100.png
     ./IMGS/male0102.png
     ./IMGS/male0102.png
     ./IMGS/male0103.png
     ./IMGS/male0104.png
     ./IMGS/male0105.png
     ./IMGS/male0106.png
     ./IMGS/male0107.png
     ./IMGS/male0108.png
     ./IMGS/male0109.png
     ./IMGS/male0110.png
     ./IMGS/male0111.png
     ./IMGS/male0112.png
     ./IMGS/male0113.png
     ./IMGS/male0114.png
     ./IMGS/male0115.png
     ./IMGS/male0116.png
     ./IMGS/male0117.png
     ./IMGS/male0118.png
     ./IMGS/male0119.png
     ./IMGS/male0120.png
     ./IMGS/male0121.png
     ./IMGS/male0122.png
     ./IMGS/male0123.png
     ./IMGS/male0124.png
     ./IMGS/male0125.png
     ./IMGS/male0126.png
     ./IMGS/male0127.png
     ./IMGS/male0128.png
     ./IMGS/male0129.png
     ./IMGS/male0130.png
     ./IMGS/male0131.png
     ./IMGS/male0132.png
     ./IMGS/male0133.png
     ./IMGS/male0134.png
     ./IMGS/male0135.png
     ./IMGS/male0136.png
     ./IMGS/male0137.png
     ./IMGS/male0138.png
     ./IMGS/male0139.png
     ./IMGS/male0140.png
     ./IMGS/male0141.png
     ./IMGS/male0142.png
     ./IMGS/male0143.png
     ./IMGS/male0144.png
     ./IMGS/male0145.png
     ./IMGS/male0146.png
     ./IMGS/male0147.png
     ./IMGS/male0148.png
     ./IMGS/male0149.png
     ./IMGS/male0150.png
     ./IMGS/male0151.png
     ./IMGS/male0152.png
     ./IMGS/male0153.png
     ./IMGS/male0154.png
     ./IMGS/male0155.png
     ./IMGS/male0156.png
     ./IMGS/male0157.png
     ./IMGS/male0158.png
     ./IMGS/male0159.png
     ./IMGS/male0160.png
     ./IMGS/male0161.png
     ./IMGS/male0162.png
     ./IMGS/male0163.png
     ./IMGS/male0164.png
     ./IMGS/male0165.png
     ./IMGS/male0166.png
     ./IMGS/male0167.png
     ./IMGS/male0168.png
     ./IMGS/male0169.png
     ./IMGS/male0170.png
     ./IMGS/male0171.png
     ./IMGS/male0172.png
     ./IMGS/male0173.png
     ./IMGS/male0174.png
     ./IMGS/male0175.png
     ./IMGS/male0176.png
     ./IMGS/male0177.png
     ./IMGS/male0178.png
     ./IMGS/male0179.png
     ./IMGS/male0180.png
     ./IMGS/male0181.png
     ./IMGS/male0182.png
     ./IMGS/male0183.png
     ./IMGS/male0184.png
     ./IMGS/male0185.png
     ./IMGS/male0186.png
     ./IMGS/male0187.png
     ./IMGS/male0188.png
     ./IMGS/male0189.png
     ./IMGS/male0190.png
     ./IMGS/male0191.png
     ./IMGS/male0192.png
     ./IMGS/male0193.png
     ./IMGS/male0194.png
     ./IMGS/male0195.png
     ./IMGS/male0196.png
     ./IMGS/male0197.png
     ./IMGS/male0198.png
     ./IMGS/male0199.png
     ./IMGS/male0200.png
     ./IMGS/male0201.png
     ./IMGS/male0202.png
     ./IMGS/male0203.png
     ./IMGS/male0204.png
     ./IMGS/male0205.png
     ./IMGS/male0206.png
     ./IMGS/male0207.png
     ./IMGS/male0208.png
     ./IMGS/male0209.png
     ./IMGS/male0210.png
     ./IMGS/male0211.png
     ./IMGS/male0212.png
     ./IMGS/male0213.png
     ./IMGS/male0214.png
     ./IMGS/male0215.png
     ./IMGS/male0216.png
     ./IMGS/male0217.png
     ./IMGS/male0218.png
     ./IMGS/male0219.png
     ./IMGS/male0220.png
     ./IMGS/male0221.png
     ./IMGS/male0222.png
     ./IMGS/male0223.png
     ./IMGS/male0224.png
     ./IMGS/male0225.png
     ./IMGS/male0226.png
     ./IMGS/male0227.png
     ./IMGS/male0228.png
     ./IMGS/male0229.png
     ./IMGS/male0230.png
     ./IMGS/male0231.png
     ./IMGS/male0232.png
     ./IMGS/male0233.png
     ./IMGS/male0234.png
     ./IMGS/male0235.png
     ./IMGS/male0236.png
     ./IMGS/male0237.png
     ./IMGS/male0238.png
     ./IMGS/male0239.png
     ./IMGS/male0240.png
     ./IMGS/male0241.png
     ./IMGS/male0242.png
     ./IMGS/male0243.png
     ./IMGS/male0244.png
     ./IMGS/male0245.png
     ./IMGS/male0246.png
     ./IMGS/male0247.png
     ./IMGS/male0248.png
     ./IMGS/male0249.png
     ./IMGS/male0250.png
     ./IMGS/male0251.png
     ./IMGS/male0252.png
     ./IMGS/male0253.png
     ./IMGS/male0254.png
     ./IMGS/male0255.png
     ./IMGS/male0256.png
     ./IMGS/male0257.png
     ./IMGS/male0258.png
     ./IMGS/male0259.png
     ./IMGS/male0260.png
     ./IMGS/male0261.png
     ./IMGS/male0262.png
     ./IMGS/male0263.png
     ./IMGS/male0264.png
     ./IMGS/male0265.png
     ./IMGS/male0266.png
     ./IMGS/male0267.png
     ./IMGS/male0268.png
     ./IMGS/male0269.png
     ./IMGS/male0270.png
     ./IMGS/male0271.png
     ./IMGS/male0272.png
     ./IMGS/male0273.png
     ./IMGS/male0274.png
     ./IMGS/male0275.png
     ./IMGS/male0276.png
     ./IMGS/male0277.png
     ./IMGS/male0278.png
     ./IMGS/male0279.png
     ./IMGS/male0280.png
     ./IMGS/male0281.png
     ./IMGS/male0282.png
     ./IMGS/male0283.png
     ./IMGS/male0284.png
     ./IMGS/male0285.png
     ./IMGS/male0286.png
     ./IMGS/male0287.png
     ./IMGS/male0288.png
     ./IMGS/male0289.png
     ./IMGS/male0290.png
     ./IMGS/male0291.png
     ./IMGS/male0292.png
     ./IMGS/male0293.png
     ./IMGS/male0294.png
     ./IMGS/male0295.png
     ./IMGS/male0296.png
     ./IMGS/male0297.png
     ./IMGS/male0298.png
     ./IMGS/male0299.png
     ./IMGS/male0300.png
 `;

  return data.split("\n")[index];
}

const frameCount = 300;

const images = [];
const imageSeq = {
  frame: 1,
};

for (let i = 0; i < frameCount; i++) {
  const img = new Image();
  img.src = files(i);
  images.push(img);
}

gsap.to(imageSeq, {
  frame: frameCount - 1,
  snap: "frame",
  ease: `none`,
  scrollTrigger: {
    scrub: 0.15,
    trigger: `#page>canvas`,
    start: `top top`,
    end: `800% top`,
    scroller: `#main`,
  },
  onUpdate: render,
});

images[1].onload = render;

function render() {
  scaleImage(images[imageSeq.frame], context);
}

function scaleImage(img, ctx) {
  var canvas = ctx.canvas;
  var hRatio = canvas.width / img.width;
  var vRatio = canvas.height / img.height;
  var ratio = Math.max(hRatio, vRatio);
  var centerShift_x = (canvas.width - img.width * ratio) / 2;
  var centerShift_y = (canvas.height - img.height * ratio) / 2;
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(
    img,
    0,
    0,
    img.width,
    img.height,
    centerShift_x,
    centerShift_y,
    img.width * ratio,
    img.height * ratio
  );
}
ScrollTrigger.create({
  trigger: "#page>canvas",
  pin: true,
  // markers:true,
  scroller: `#main`,
  start: `top top`,
  end: `800% top`,
});



gsap.to("#page1",{
  scrollTrigger:{
    trigger:`#page1`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})
gsap.to("#page2",{
  scrollTrigger:{
    trigger:`#page2`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})
gsap.to("#page3",{
  scrollTrigger:{
    trigger:`#page3`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})
gsap.to("#page4",{
  scrollTrigger:{
    trigger:`#page4`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})

document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.getElementById('menu-toggle');
  const nav = document.querySelector('.nav');

  menuToggle.addEventListener('click', function () {
      nav.classList.toggle('show');
  });

  // Close the mobile menu when clicking outside
  document.addEventListener('click', function (event) {
      if (!menuToggle.contains(event.target) && !nav.contains(event.target)) {
          nav.classList.remove('show');
      }
  });
});

function contact() {
  alert("Thanks for your precious time.");
  window.location.href = "contact.php";
}