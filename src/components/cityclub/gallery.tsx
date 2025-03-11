export function Gallery() {
  const images = [
    {
      src: "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80",
      alt: "Salle de musculation",
      span: "col-span-1",
    },
    {
      src: "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=600&q=80",
      alt: "Cours collectif",
      span: "col-span-2",
    },
    {
      src: "https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=600&q=80",
      alt: "Équipement de cardio",
      span: "col-span-1",
    },
    {
      src: "https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=600&q=80",
      alt: "Espace détente",
      span: "col-span-1",
    },
    {
      src: "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=600&q=80",
      alt: "Cours de spinning",
      span: "col-span-1",
    },
  ];

  return (
    <section className="py-16 bg-white" id="gallery">
      <div className="container mx-auto px-6">
        <div className="text-center mb-12">
          <span className="text-[#f26f21] font-semibold text-lg">GALERIE</span>
          <h2 className="text-4xl font-bold text-gray-900 mt-2 mb-4">
            Découvrez Nos Installations
          </h2>
          <p className="text-gray-600 max-w-2xl mx-auto">
            Explorez nos clubs modernes équipés des dernières machines et
            technologies pour une expérience fitness optimale
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          {images.map((image, index) => (
            <div
              key={index}
              className={`${image.span} overflow-hidden rounded-lg group relative`}
            >
              <img
                src={image.src}
                alt={image.alt}
                className="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                <div className="p-4 w-full">
                  <h3 className="text-white font-bold">{image.alt}</h3>
                  <div className="w-10 h-1 bg-[#f26f21] mt-2"></div>
                </div>
              </div>
            </div>
          ))}
        </div>

        <div className="mt-10 text-center">
          <a
            href="#"
            className="inline-block bg-[#f26f21] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#e05a10] transition-colors"
          >
            VOIR PLUS DE PHOTOS
          </a>
        </div>
      </div>
    </section>
  );
}
