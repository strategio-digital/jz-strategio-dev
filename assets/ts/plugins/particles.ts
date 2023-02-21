/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

import { loadFull } from 'tsparticles'
import { Container, tsParticles } from 'tsparticles-engine'

export default async () => {
    //@ts-ignore
    await loadFull(tsParticles)

    function calculateParticles() {
        return 0.00003 * window.innerWidth * window.innerHeight;
    }

    const hero = await tsParticles.load('hero-section', {
        fpsLimit: 60,
        retina_detect: true,
        fullScreen: false,
        background: {
            image: 'radial-gradient(circle,rgb(19,24,129) 30%,rgb(11,15,87) 70%)'
        },
        particles: {
            number: {
                value: calculateParticles()
            },
            links: {
                distance: 200,
                enable: true,
                opacity: 0.2
            },
            move: {
                enable: true,
                speed: {min: 1, max: 3}
            },
            size: {
                value: { min: 1, max: 3 }
            },
            opacity: {
                value: { min: 0.3, max: 0.5 }
            }
        },
        interactivity: {
            events: {
                onClick: {
                    enable: true,
                    mode: 'repulse'
                },
                onHover: {
                   enable: true,
                   mode: 'repulse'
                }
            }
        }
    })

    window.addEventListener('resize', () => {
        const particles = hero as Container;
        particles.options.particles.number.value = calculateParticles()
        particles.refresh()
    })
}