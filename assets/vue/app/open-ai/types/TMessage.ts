/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

export type TMessage = {
    time: Date
    name: string
    shortName: string
    role: string
    content: string
}