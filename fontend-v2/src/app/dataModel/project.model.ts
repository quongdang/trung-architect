import {BaseEntity} from './baseEntity.model';

export class Project implements BaseEntity {
    constructor(
        public id?: number,
        public title_vn?: string,
        public title_en?: string,
        public subtitle_vn?: string,
        public subtitle_en?: string,
        public content_vn?: string,
        public content_en?: string,
        public category_id?: number,
        public created?: string,
    ) {
    }
}
