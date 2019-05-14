import {BaseEntity} from './baseEntity.model';

export class Project implements BaseEntity {
    constructor(
        public id?: number,
        public title?: Map<String, String>,
        public subTitle?: Map<String, String>,
        public content?: Map<String, String>,
        public url?: String,
        public images1?: String,
        public images2?: String,
        public images3?: String,
        public images4?: String,
        public created?: Date,
    ) {
    }
}
